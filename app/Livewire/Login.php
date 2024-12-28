<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OTP;
use App\Models\LoginToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Login extends Component
{ public $email, $password, $otp, $loginMethod = null, $showOtpMessage = false;
    public $isToggleOtp = false;

    public $resendOtpMessage = false;

    public $inputDisabled=false;

    // Toggle login methods
    public function toggleForm($method)
    {
        $this->loginMethod = $method;
    }

    // Send OTP method
    public function sendOtp()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $this->email)->first();

        if ($user && Hash::check($this->password, $user->password)) {
            $otp = rand(100000, 999999);

            OTP::updateOrCreate(
                ['email' => $this->email],
                [
                    'otp' => $otp,
                    'expires_at' => Carbon::now()->addMinutes(10),
                ]
            );

            // Send OTP to email
            try {
                Mail::raw("Your OTP is: $otp", function ($message) {
                    $message->to($this->email)
                        ->subject('Your OTP for Login');
                });
                $this->isToggleOtp = true;
                $this->inputDisabled = true;
                $this->showOtpMessage = true;
                
            } catch (\Exception $e) {
                session()->flash('error', 'Failed to send OTP. Please try again.');
            }
        } else {
            session()->flash('error', 'Invalid email or password.');
        }
    }

    // Verify OTP
    public function verifyOtp()
    {
        $this->validate([
            'otp' => 'required|numeric',
        ]);

        $otpRecord = OTP::where('email', $this->email)->first();

        if (!$otpRecord || $otpRecord->otp !== $this->otp) {
            session()->flash('error', 'Invalid OTP.');
            return;
        }

        if (Carbon::now()->greaterThan($otpRecord->expires_at)) {
            session()->flash('error', 'OTP has expired.');
            return;
        }

        $otpRecord->delete();

        $user = User::where('email', $this->email)->first();

        if ($user) {
            Auth::login($user);
            return redirect('/dashboard')->with('success', 'Login successful.');
        }

        session()->flash('error', 'Login failed.');
    }

    public function reSendOtp(){
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $this->email)->first();

        if ($user && Hash::check($this->password, $user->password)) {
            $otp = rand(100000, 999999);

            OTP::updateOrCreate(
                ['email' => $this->email],
                [
                    'otp' => $otp,
                    'expires_at' => Carbon::now()->addMinutes(10),
                ]
            );

            // Send OTP to email
            try {
                Mail::raw("Your OTP is: $otp", function ($message) {
                    $message->to($this->email)
                        ->subject('Your OTP for Login');
                });
                $this->isToggleOtp = true;
                $this->inputDisabled = true;
                $this->showOtpMessage = true;
                $this->resendOtpMessage = true;
                
            } catch (\Exception $e) {
                session()->flash('error', 'Failed to send OTP. Please try again.');
            }
        } else {
            session()->flash('error', 'Invalid email or password.');
        }
    }

    // Send login link
    public function sendLoginLink()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $this->email)->first();

        // Generate a secure token
        $token = Str::random(64);

        // Store the token using the model
        LoginToken::updateOrCreate(
            ['email' => $user->email],
            [
                'token' => $token,
                'expires_at' => now()->addMinutes(10),
            ]
        );

        // Send the login link via email
        $loginLink = url('/login/link?token=' . $token . '&email=' . $user->email);
        try {
            Mail::raw("Click the link to log in: $loginLink", function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Your Login Link');
            });
            $this->inputDisabled = true;
            session()->flash('success', 'Login link sent to your email.');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to send login link. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
