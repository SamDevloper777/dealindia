<?php

namespace App\Http\Controllers;
use App\Models\OTP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',                   
            'gender' => 'required|string',                   
            'dob' => 'required|date',                   
            'email' => 'required|email|unique:users,email',                   
            'address' => 'required|string',                   
            'mobile' => 'required|digits:10|regex:/^[6789][0-9]{9}$/',              
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
            $data = User::create([
                'name' => $request->name,                                       
                'mobile' => $request->mobile,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'email' => $request->email,
                'address' => $request->address,
                'password' => Hash::make($request->password),
            ]);

            if ($data) {
                Mail::raw("Hello $request->name, your Real Account has been Created Successfully.", function ($message) use ($request) {
                    $message->to($request->email)
                            ->subject('New Real Account Created');
                });
                return redirect()->route('login')->with('success', 'Account created successfully. Please log in.');
            }
    }


    public function sendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $otp = rand(100000, 999999);

            OTP::updateOrCreate(
                ['email' => $request->email],
                [
                    'otp' => $otp,
                    'expires_at' => Carbon::now()->addMinutes(10),
                ]
            );

            // Send OTP to email
            try {
                Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
                    $message->to($request->email)
                            ->subject('Your OTP for Login');
                });

                return redirect('/verification')->with('success', 'OTP sent successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Failed to send OTP. Please try again.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }


    public function verifyOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $otpRecord = OTP::where('email', $request->email)->first();

        if (!$otpRecord || $otpRecord->otp !== $request->otp) {
            return redirect()->back()->with('error', 'Invalid OTP.');
        }

        if (Carbon::now()->greaterThan($otpRecord->expires_at)) {
            return redirect()->back()->with('error', 'OTP has expired.');
        }

        $otpRecord->delete();

        $user = User::where('email', $request->email)->first();

        if ($user) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/dashboard')->with('success', 'Login successful.');
        }
        return redirect()->back()->with('error', 'Failed to log in.');
    }

}
