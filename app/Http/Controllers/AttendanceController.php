<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Auth;
use App\Models\MyClass; // આ લાઈન ઉપર હોવી જોઈએ
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\StudentRecord;
use App\Models\Section; // આ મોડલ ચેક કરી લેજો
class AttendanceController extends Controller
{
   public function index()
{
    $user = Auth::user();
    $role = $user->user_type; 

    if ($role == 'super_admin' || $role == 'admin') {
        return redirect()->route('attendance.admin.manage');
    } elseif ($role == 'teacher') {
        return redirect()->route('attendance.teacher.manage');
    } elseif ($role == 'student') {
        return redirect()->route('attendance.student.view');
    } elseif ($role == 'parent') {
        // પેરેન્ટ માટે નવો રૂટ અથવા મેથડ
        return redirect()->route('my_children'); 
    }

    return redirect()->route('dashboard')->with('flash_danger', 'Access Denied!');
}

    /**
     * એડમિન માટે ક્લાસ સિલેક્શન પેજ
     */
    public function admin_manage() 
    {
        $data['my_classes'] = MyClass::all();
        return view('pages.support_team.attendance.admin', $data);
    }

    /**
     * ટીચર માટેનું પેજ (હજી ખાલી છે)
     */

public function teacher_manage() 
{
    $user_id = Auth::user()->id;

    // ૧. એવા સેક્શન લાવો જ્યાં આ ટીચર ઇન્ચાર્જ છે
    // અને સાથે તે કયા ક્લાસ (my_class) ના સેક્શન છે તે પણ લાવો
    $teacher_sections = Section::where('teacher_id', $user_id)->with('my_class')->get();

    // ૨. જો ટીચર પાસે કોઈ સેક્શન ના હોય તો એરર ના આવે તે માટે ખાલી એરે
    $my_classes = $teacher_sections->pluck('my_class')->unique();

    return view('pages.support_team.attendance.teacher', compact('my_classes', 'teacher_sections'));
}  /**
     * સ્ટુડન્ટ માટેનું રિપોર્ટ પેજ (હજી ખાલી છે)
     */
   public function student_view() 
{
    $user_id = Auth::user()->id;
    $current_month = date('m');
    $current_year = date('Y');

    // ૧. સ્ટુડન્ટની આ મહિનાની બધી હાજરી લાવો
    $attendance = \App\Models\Attendance::where('student_id', $user_id)
                    ->whereMonth('att_date', $current_month)
                    ->whereYear('att_date', $current_year)
                    ->orderBy('att_date', 'asc')
                    ->get();

    // ૨. ટકાવારી (Percentage) ગણતરી
    $total_days = $attendance->count();
    $present_days = $attendance->where('status', 'P')->count();
    $percentage = $total_days > 0 ? round(($present_days / $total_days) * 100, 2) : 0;

    return view('pages.support_team.attendance.student', compact('attendance', 'percentage', 'present_days', 'total_days'));
}
 
    /**
     * ક્લાસ સિલેક્ટ કર્યા પછી સ્ટુડન્ટ લિસ્ટ બતાવવું
     */
public function select_class(Request $req)
{
    $class_id = $req->my_class_id;
    $date = $req->date;

    // ૧. StudentRecord ટેબલમાંથી આ ક્લાસના સ્ટુડન્ટ્સ લાવો
    // 'user' રિલેશનનો ઉપયોગ કરીને તેમનું નામ 'users' ટેબલમાંથી આવશે
    $students = \App\Models\StudentRecord::where('my_class_id', $class_id)
                    ->with('user') 
                    ->get();

    // ૨. તે તારીખની હાજરીનો ડેટા લાવો
    $attendance = \App\Models\Attendance::where('my_class_id', $class_id)
                            ->where('att_date', $date)
                            ->get();

    return view('pages.support_team.attendance.manage', compact('students', 'class_id', 'date', 'attendance'));
}
    /**
     * એટેન્ડન્સ સેવ કરવી (Insert or Update)
     */
    public function store(Request $req)
    {
        $date = $req->att_date;
        $class_id = $req->my_class_id;

        if($req->attendance) {
            foreach ($req->attendance as $student_id => $status) {
                Attendance::updateOrCreate(
                    [
                        'student_id' => $student_id,
                        'att_date' => $date,
                    ],
                    [
                        'my_class_id' => $class_id,
                        'status' => $status,
                        'year' => date('Y'), 
                    ]
                );
            }
            return redirect()->route('attendance.index')->with('flash_success', 'Attendance Saved Successfully!');
        }

        return back()->with('flash_danger', 'No attendance data found!');
    }


}
?>