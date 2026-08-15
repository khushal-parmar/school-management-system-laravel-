<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showDirectResetForm()
    {
        return view('auth.passwords.direct_reset');
    }

    // પાસવર્ડ પ્રોસેસ અને અપડેટ કરવા માટે
    public function processDirectReset(Request $request)
    {
        // 1. ઈમેઈલ અને પાસવર્ડ વેલિડેશન
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.exists' => 'આ ઈમેઈલ આઈડી સિસ્ટમમાં રજિસ્ટર્ડ નથી.',
            'password.confirmed' => 'પાસવર્ડ અને કન્ફર્મ પાસવર્ડ મેચ થતા નથી.',
            'password.min' => 'પાસવર્ડ ઓછામાં ઓછો ૬ અક્ષરનો હોવો જોઈએ.'
        ]);

        // 2. યુઝર શોધીને નવો પાસવર્ડ સેટ કરવો
        $user = User::where('email', $request->email)->first();
        
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('login')->with('status', 'તમારો પાસવર્ડ સફળતાપૂર્વક અપડેટ થઈ ગયો છે! હવે લોગીન કરો.');
        }

        return back()->withErrors(['email' => 'યુઝર મળ્યો નથી.']);
    }
}
