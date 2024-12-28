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
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',                   
            'gender' => 'required|string',                   
            'dob' => 'required',                   
            'email' => 'required',                   
            'address' => 'required',                   
            'mobile' => 'required|digits:10|regex:/^[6789][0-9]{9}$/',                
            'password' => 'required|min:8|confirmed',
        ]);
            if ($validator->fails()) {
                return redirect()->back()->with('error',  $validator->messages());
            }
        else {    
            $data = User::create([
                'name' => $request->name,                                       
                'mobile' => $request->mobile,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'email' => $request->email,
                'address' => $request->address,
                'password' => $request->password,       
            ]);
    
            if ($data) {
                Mail::raw("Hello $request->name your Real Account has been Created Successfully.", function ($message) use ($request) {
                    $message->to($request->email)
                            ->subject('New Real Account Created');
                });

            }
        }
    }
    // Send OTP to email
    public function sendOTP(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
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
    }
}
