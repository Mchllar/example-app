<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Staff;
use App\Models\Gender;
use App\Models\Program;
use App\Models\Religion;
use App\Models\School;
use App\Models\Student;
use App\Models\Country;
use App\Mail\SendOtpMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\SendResetLinkEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    // Show login form
    public function login()
    {
        return view("auth.login");
    }
    
    // Show registration form
    public function register()
    {
        $countries = Country::all();
        $genders = Gender::all();
        $religions = Religion::all();
        $programs = Program::all();
        $schools = School::all();
    
        return view("auth.register", compact('countries', 'genders', 'religions','programs','schools'));
    }

    // Show 2FA verification form for registration
    public function regOTP()
    {
        return view("auth.verify-2fa");
    }

    // Show OTP verification form for login
    public function logOTP()
    {
        return view("auth.logOTP");
    }

    // Show forgot password form
    public function showForgotPasswordForm()
    {
        return view('auth.forgot_password');
    }

    // Show reset password form
    public function showResetPasswordForm($token)
    {
        return view('auth.reset_password', ['token' => $token]);
    }

    // Show email sent notification
    public function showemailwassent()
    {
        return view("auth.emailsent");
    }


    public function conferenceReview(){
        return view('student.conference_review');
    }


    public function thesisCorrection(){
        return view('student.thesis_correction');
    }


    public function thesisSubmission(){
        return view('student.thesis_submission');
    }

    public function noticeSubmission(){
        return view ('student.notice'); 
    }

    // Show landing page based on user role
    public function showLandingPage()
    {
        $user = auth()->user();
    
        if ($user) {
            switch ($user->role_id) {
                case 1: // Student
                    return view('student.landing');
                case 2: // Supervisor
                    return view('supervisor.landing');
                case 3: // Staff
                    return view('staff.landing');
                default:
                    abort(403, 'Unauthorized action.');
            }
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    // Logout
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect('/')->with('message', 'You have been logged out successfully!');
    }

    // Register users
public function store(Request $request)
{
    // Validate incoming request data
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'role' => 'required|in:1,2,3',
        'date_of_birth' => 'nullable|date',
        'phone_number' => 'nullable|string|max:20',
        'gender' => 'nullable|exists:gender,id',
        'nationality' => 'nullable|exists:country,id',
        'religion' => 'nullable|exists:religion,id',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Handle profile picture upload
    $profilePath = null;
    if ($request->hasFile('profile')) {
        $profilePath = $request->file('profile')->store('profiles', 'public');
    }

    // Store user details and role-specific data in session
    $userData = [
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'profile' => $profilePath,
        'role_id' => $validatedData['role'],
        'date_of_birth' => $validatedData['date_of_birth'] ? date('Y-m-d', strtotime($validatedData['date_of_birth'])) : null,
        'phone_number' => $validatedData['phone_number'],
        'gender_id' => $validatedData['gender'],
        'country_id' => $validatedData['nationality'],
        'religion_id' => $validatedData['religion'],
        'password' => Hash::make($validatedData['password']), // Ensure password is hashed
    ];

    // Store user details in the session
    session(['user_details' => $userData]);

    // Create role-specific record (Student, Staff)
    if ($validatedData['role'] == 1) {
        // Student-specific fields
        $studentData = [
            'student_number' => $request->input('student_number'),
            'program_id' => $request->input('programme'),
        ];

        // Store student details in the session
        session(['student_details' => $studentData]);
    } elseif ($validatedData['role'] == 2) {
        // Supervisor-specific fields
        $staffData = [
            'curriculum_vitae' => $request->file('curriculum_vitae')->store('cv', 'public'),
            'school_id' => $request->input('school'),
        ];

        // Store staff details in the session
        session(['staff_details' => $staffData]);
    }

    // Generate and send OTP
    $otp = rand(100000, 999999);
    session(['email' => $userData['email'], 'otp_code' => $otp]);
    Mail::to($userData['email'])->send(new SendOtpMail($otp));

    // Redirect to OTP verification page
    return redirect('/verify-registration-otp');
}

    


    // Verify registration OTP
public function verifyRegistrationOtp(Request $request)
{
    $request->validate([
        'otp' => 'required|numeric',
    ]);

    $otp_code = session('otp_code');
    $userDetails = session('user_details');
    $role = $userDetails['role_id']; // Retrieve the role from the session

    if ($userDetails && $request->otp == $otp_code) {
        // OTP is valid, complete the registration process

        // Retrieve role-specific details from the session
        $studentDetails = session('student_details');
        $staffDetails = session('staff_details');

        // Additional processing based on the role...
        
        // Create User
        $user = User::create($userDetails);

        // Clear the OTP code
        $user->otp_code = null;
        $user->save();

        // Log the user in
        auth()->login($user);

        // Clear the user details and OTP code from the session
        $request->session()->forget(['otp_code', 'user_details', 'student_details', 'staff_details']);

        return redirect('/')->with('message', 'Registration successful!');
    } else {
        // OTP is invalid, redirect back with an error message
        return redirect('/verify-registration-otp')->with('error', 'Invalid OTP.');
    }
}


    // Authenticate user
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        // Retrieve the user instance directly from the database
        $user = User::where('email', $formFields['email'])->first();

        // Check if the user exists and the password is correct
        if ($user && Hash::check($formFields['password'], $user->password)) {
            // Generate OTP
            $otp = rand(100000, 999999);
            $user->otp_code = $otp;
            $user->otp_created_at = now();
            $user->save();

            // Store email in session for OTP verification
            session(['email' => $formFields['email']]);

            // Send OTP to user's email
            Mail::to($user->email)->send(new SendOtpMail($otp));

            // Redirect to OTP verification page
            return redirect('/verify-login-otp');
        } else {
            return redirect('/login')->with('error', 'Wrong credentials!!')->with('showResetLink', true);
        }
    }

    // Verify login OTP
    public function verifyLoginOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);

        $email = session('email');
        $user = User::where('email', $email)->first();

        if ($user && $request->otp == $user->otp_code) {
            // OTP is valid, complete the login process

            // Check if 2 mins
            if (Carbon::parse($user->otp_created_at)->addMinutes(2)->isPast()) {
                return redirect('/verify-login-otp')->with('error', 'OTP has expired. Please resend.');
            } else {
                $user->otp_code = null; // Clear the OTP code
                $user->save();

                // Log the user in
                auth()->login($user);

                // Clear the email from the session
                $request->session()->forget('email');

                return redirect('/')->with('message', 'You are now logged in!');
            }
        } else {
            // OTP is invalid, redirect back with an error message
            return redirect('/verify-login-otp')->with('error', 'Invalid OTP.');
        }
    }

    // Resend login OTP
    public function resendOtp()
    {
        $email = session('email');
        $user = User::where('email', $email)->first();

        if ($user) {
            // Generate a new OTP and store the generation time
            $otp = rand(100000, 999999);
            $user->otp_code = $otp;
            $user->otp_created_at = now();
            $user->save();

            // Send the new OTP to the user's email
            Mail::to($user->email)->send(new SendOtpMail($otp));

            return redirect('/verify-login-otp')->with('message', 'A new OTP has been sent to your email.');
        } else {
            return redirect('/verify-login-otp')->with('error', 'Error resending OTP. Please try again.');
        }
    }

    // Resend registration OTP
    public function resendRegOtp()
    {
        $email = session('email');
        $userDetails = session('user_details');

        if ($email && $userDetails) {
            // Generate a new OTP and store the generation time
            $otp = rand(100000, 999999);

            // Update the OTP and OTP creation time in the session
            session(['otp_code' => $otp, 'otp_created_at' => now()]);

            // Send the new OTP to the user's email
            Mail::to($email)->send(new SendOtpMail($otp));

            return redirect('/verify-registration-otp')->with('message', 'A new OTP has been sent to your email.');
        } else {
            return redirect('/verify-registration-otp')->with('error', 'Error resending OTP. Please try again.');
}
}
}