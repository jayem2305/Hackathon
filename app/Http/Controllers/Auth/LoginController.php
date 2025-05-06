<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        session([
            'captcha_num1' => rand(1, 10),
            'captcha_num2' => rand(1, 10),
        ]);

        return view('auth.login');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found']);
        }

        $otp = rand(100000, 999999);
        $user->update([
            'otp' => $otp,
            'otp_expires_at' => Carbon::now()->addMinutes(5),
        ]);

        Mail::raw("Your OTP is: $otp", function ($message) use ($user) {
            $message->to($user->email)->subject('Your OTP Code');
        });

        session([
            'otp_sent' => true,
            'email' => $user->email,
        ]);

        return back()->with('status', 'OTP sent to your email.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'captcha' => 'required|numeric',
        ]);

        $email = session('email'); // get saved email

        if (!$email) {
            return back()->withErrors(['email' => 'Please enter your email and send OTP first.']);
        }

        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        // Only validate OTP if not already verified
        if (!session('otp_verified')) {
            $request->validate(['otp' => 'required|numeric']);

            if ($user->otp !== $request->otp || Carbon::parse($user->otp_expires_at)->isPast()) {
                return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
            }

            session(['otp_verified' => true]); // Mark OTP as verified
        }

        $expected = session('captcha_num1') + session('captcha_num2');
        if ((int) $request->captcha !== $expected) {
            return back()->withErrors(['captcha' => 'Captcha incorrect.']);
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Invalid password.']);
        }

        Auth::login($user);
        session()->forget(['otp_sent', 'otp_verified', 'email']); // clear session flags

        return redirect()->route('dashboard');
    }
}
