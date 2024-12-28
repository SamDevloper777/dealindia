<?php

namespace App\Http\Controllers;
use App\Models\OTP;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validator;

class AuthController extends Controller
{
    // Send OTP to email
    public function sendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'mobile' => 'required|digits:10|regex:/^[0-9]{10}$/',                   
            'email' => 'required|email|exists:users,email',
        ]);

        // Generate a random 6-digit OTP
        $otp = rand(100000, 999999);

        // Store OTP in the database
        OTP::updateOrCreate(
            ['email' => $request->email],
            [
                'otp' => $otp,
                'expires_at' => Carbon::now()->addMinutes(10), // OTP valid for 10 minutes
            ]
        );

        // Send OTP to email
        Mail::raw("Your OTP is: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Your OTP for Login');
        });

        return redirect('/verification')->with('success', 'OTP sent Successfully');


        // return response()->json(['message' => 'OTP sent successfully!']);
    }

    public function verifyOTP(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric',
        ]);

        $otpRecord = OTP::where('email', $request->email)->first();

        // Validate OTP
        if (!$otpRecord || $otpRecord->otp !== $request->otp) {
            return redirect()->back()->with('error', 'Invalid OTP.');
        }

        // Check if OTP has expired
        if (Carbon::now()->greaterThan($otpRecord->expires_at)) {
            return redirect()->back()->with('error', 'OTP has expired.');
        }

        // Clean up OTP record
        $otpRecord->delete();

        // Log the user in
        $user = User::where('email', $request->email)->first();
        Auth::login($user);

        return redirect('/dashboard')->with('success', 'Login Successfully');


        // return response()->json(['message' => 'Login successful.']);
    }
}
