<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Http\Requests\UserChangePass;
use App\Http\Requests\UserUpdate;
use App\Repositories\UserRepo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class MyAccountController extends Controller
{
    protected $user;

    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }

    public function edit_profile()
    {
        $d['my'] = Auth::user();
        return view('pages.support_team.my_account', $d);
    }

    public function update_profile(UserUpdate $req)
    {
        $user = Auth::user();

        $d = $user->username ? $req->only(['email', 'phone', 'address']) : $req->only(['email', 'phone', 'address', 'username']);

        if(!$user->username && !$req->username && !$req->email){
            return back()->with('pop_error', __('msg.user_invalid'));
        }

        $user_type = $user->user_type;
        $code = $user->code;

        if($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $f = Qs::getFileMetaData($photo);
            $f['name'] = 'photo.' . $f['ext'];
            $f['path'] = $photo->storeAs(Qs::getUploadPath($user_type).$code, $f['name']);
            $d['photo'] = asset('storage/' . $f['path']);
        }

        $this->user->update($user->id, $d);
        return back()->with('flash_success', __('msg.update_ok'));
    }

    public function change_pass(UserChangePass $req)
    {
        $user_id = Auth::user()->id;
        $my_pass = Auth::user()->password;
        $old_pass = $req->current_password;
        $new_pass = $req->password;

        if(password_verify($old_pass, $my_pass)){
            $data['password'] = Hash::make($new_pass);
            $this->user->update($user_id, $data);
            return back()->with('flash_success', __('msg.p_reset'));
        }

        return back()->with('flash_danger', __('msg.p_reset_fail'));
    }
  public function show_fees()
{
    $user_id = Auth::user()->id;
    $current_session = Qs::getCurrentSession(); // તમારી સિસ્ટમ મુજબ સત્ર

    // ૧. સ્ટુડન્ટનો રેકોર્ડ મેળવો
    $student = DB::table('student_records')->where('user_id', $user_id)->first();

    if (!$student) {
        return back()->with('flash_danger', 'Student record not found.');
    }

    // ૨. ફી લાવો: જે આ સ્ટુડન્ટના ક્લાસની હોય અથવા બધા (NULL) ક્લાસ માટે હોય
    $fees = DB::table('payments')
        ->leftJoin('payment_records', function($join) use ($student) {
            $join->on('payments.id', '=', 'payment_records.payment_id')
                 ->where('payment_records.student_id', '=', $student->user_id);
        })
        ->where('payments.year', $current_session) // ચાલુ વર્ષની જ ફી બતાવો
        ->where(function($q) use ($student) {
            $q->where('payments.my_class_id', $student->my_class_id)
              ->orWhereNull('payments.my_class_id');
        })
        ->select(
            'payments.title',
            'payments.amount as total_amount',
            'payment_records.amt_paid',
            'payment_records.balance',
            'payment_records.paid'
        )
        ->get();

    return view('pages.student.my_fees', compact('fees'));
}
}
