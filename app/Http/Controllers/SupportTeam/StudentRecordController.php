<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Helpers\Mk;
use App\Http\Requests\Student\StudentRecordCreate;
use App\Http\Requests\Student\StudentRecordUpdate;
use App\Repositories\LocationRepo;
use App\Repositories\MyClassRepo;
use App\Repositories\StudentRepo;
use App\Repositories\UserRepo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StudentRecordController extends Controller
{
    protected $loc, $my_class, $user, $student;

   public function __construct(LocationRepo $loc, MyClassRepo $my_class, UserRepo $user, StudentRepo $student)
   {
       $this->middleware('teamSA', ['only' => ['edit','update', 'reset_pass', 'create', 'store', 'graduated'] ]);
       $this->middleware('super_admin', ['only' => ['destroy',] ]);

        $this->loc = $loc;
        $this->my_class = $my_class;
        $this->user = $user;
        $this->student = $student;
   }

    public function reset_pass($st_id)
    {
        $st_id = Qs::decodeHash($st_id);
        $data['password'] = Hash::make('student');
        $this->user->update($st_id, $data);
        return back()->with('flash_success', __('msg.p_reset'));
    }

    public function create()
    {
        $data['my_classes'] = $this->my_class->all();
        $data['parents'] = $this->user->getUserByType('parent');
        $data['dorms'] = $this->student->getAllDorms();
        $data['states'] = $this->loc->getStates();
        $data['nationals'] = $this->loc->getAllNationals();
        return view('pages.support_team.students.add', $data);
    }

   public function store(StudentRecordCreate $req)
{
    $data =  $req->only(Qs::getUserRecord());
    $sr =  $req->only(Qs::getStudentData());

    // --- નવું પેરેન્ટ લોજિક (Duplicate Entry રોકવા માટે) ---
    $parent_id = null;

    // જો નવી પેરેન્ટ વિગતો ભરી હોય
    if (!$req->my_parent_id && $req->parent_email) {
        
        // પેલા ચેક કરો કે આ ઈમેઈલ વાળો યુઝર પહેલેથી છે?
        // અહીં \App\User:: સીધું વાપર્યું છે જેથી ઈમ્પોર્ટની માથાકૂટ ના રહે
        $check_parent = \App\User::where('email', $req->parent_email)->first();
        
        if (!$check_parent) {
            $p_data['name'] = ucwords($req->parent_name);
            $p_data['email'] = $req->parent_email;
            $p_data['phone'] = $req->parent_phone;
            $p_data['user_type'] = 'parent';
            $p_data['password'] = Hash::make('parent'); 
            $p_data['username'] = $req->parent_email; // ઈમેઈલને જ યુઝરનેમ બનાવ્યું
            $p_data['photo'] = Qs::getDefaultUserImage();
            $p_data['code'] = strtoupper(Str::random(10));

            $new_parent = \App\User::create($p_data);
            $parent_id = $new_parent->id;
        } else {
            // જો ઈમેઈલ મળી જાય, તો તે જ પેરેન્ટની ID વાપરો, નવી એન્ટ્રી ના કરો
            $parent_id = $check_parent->id;
        }
    } else {
        $parent_id = $req->my_parent_id ? Qs::decodeHash($req->my_parent_id) : null;
    }
    // --- પેરેન્ટ લોજિક પૂરું ---

    $ct = $this->my_class->findTypeByClass($req->my_class_id)->code;

    $data['user_type'] = 'student';
    $data['name'] = ucwords($req->name);
    $data['code'] = strtoupper(Str::random(10));
    $data['password'] = Hash::make('student');
    $data['photo'] = Qs::getDefaultUserImage();
    
    // સ્ટુડન્ટનું યુઝરનેમ જનરેટ કરો
    $adm_no = $req->adm_no;
    $data['username'] = strtoupper(Qs::getAppCode().'/'.$ct.'/'.$sr['year_admitted'].'/'.($adm_no ?: mt_rand(1000, 99999)));

    // જો સ્ટુડન્ટના ઈમેઈલ જેવું કઈ નાખ્યું હોય તો તે ડુપ્લીકેટ ના થાય એ જોજો
    $user = $this->user->create($data); 

    $sr['adm_no'] = $data['username'];
    $sr['user_id'] = $user->id;
    $sr['my_parent_id'] = $parent_id; // નવી ID અહીં સેટ થશે
    $sr['session'] = Qs::getSetting('current_session');

    $this->student->createRecord($sr); 
    return Qs::jsonStoreOk();
}
    public function listByClass($class_id)
    {
        $data['my_class'] = $mc = $this->my_class->getMC(['id' => $class_id])->first();
        $data['students'] = $this->student->findStudentsByClass($class_id);
        $data['sections'] = $this->my_class->getClassSections($class_id);

        return is_null($mc) ? Qs::goWithDanger() : view('pages.support_team.students.list', $data);
    }

    public function graduated()
    {
        $data['my_classes'] = $this->my_class->all();
        $data['students'] = $this->student->allGradStudents();

        return view('pages.support_team.students.graduated', $data);
    }

    public function not_graduated($sr_id)
    {
        $d['grad'] = 0;
        $d['grad_date'] = NULL;
        $d['session'] = Qs::getSetting('current_session');
        $this->student->updateRecord($sr_id, $d);

        return back()->with('flash_success', __('msg.update_ok'));
    }

    public function show($sr_id)
    {
        $sr_id = Qs::decodeHash($sr_id);
        if(!$sr_id){return Qs::goWithDanger();}

        $data['sr'] = $this->student->getRecord(['id' => $sr_id])->first();

        /* Prevent Other Students/Parents from viewing Profile of others */
        if(Auth::user()->id != $data['sr']->user_id && !Qs::userIsTeamSAT() && !Qs::userIsMyChild($data['sr']->user_id, Auth::user()->id)){
            return redirect(route('dashboard'))->with('pop_error', __('msg.denied'));
        }

        return view('pages.support_team.students.show', $data);
    }

    public function edit($sr_id)
    {
        $sr_id = Qs::decodeHash($sr_id);
        if(!$sr_id){return Qs::goWithDanger();}

        $data['sr'] = $this->student->getRecord(['id' => $sr_id])->first();
        $data['my_classes'] = $this->my_class->all();
        $data['parents'] = $this->user->getUserByType('parent');
        $data['dorms'] = $this->student->getAllDorms();
        $data['states'] = $this->loc->getStates();
        $data['nationals'] = $this->loc->getAllNationals();
        return view('pages.support_team.students.edit', $data);
    }

    public function update(StudentRecordUpdate $req, $sr_id)
    {
        $sr_id = Qs::decodeHash($sr_id);
        if(!$sr_id){return Qs::goWithDanger();}

        $sr = $this->student->getRecord(['id' => $sr_id])->first();
        $d =  $req->only(Qs::getUserRecord());
        $d['name'] = ucwords($req->name);

        if($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = 'photo.' . $f['ext'];
            $f['path'] = $photo->storeAs(Qs::getUploadPath('student').$sr->user->code, $f['name']);
            $d['photo'] = asset('storage/' . $f['path']);
        }

        $this->user->update($sr->user->id, $d); // Update User Details

        $srec = $req->only(Qs::getStudentData());

        $this->student->updateRecord($sr_id, $srec); // Update St Rec

        /*** If Class/Section is Changed in Same Year, Delete Marks/ExamRecord of Previous Class/Section ****/
        Mk::deleteOldRecord($sr->user->id, $srec['my_class_id']);

        return Qs::jsonUpdateOk();
    }

    public function destroy($st_id)
    {
        $st_id = Qs::decodeHash($st_id);
        if(!$st_id){return Qs::goWithDanger();}

        $sr = $this->student->getRecord(['user_id' => $st_id])->first();
        $path = Qs::getUploadPath('student').$sr->user->code;
        Storage::exists($path) ? Storage::deleteDirectory($path) : false;
        $this->user->delete($sr->user->id);

        return back()->with('flash_success', __('msg.del_ok'));
    }

}
