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
use App\Models\Thesis;
use App\Mail\UserRegistered;
use App\Mail\SendOtpMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\PasswordReset;


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
                case 1:
                    $student = Student::with('user', 'user.religion')->where('user_id', $user->id)->firstOrFail();
                    return view('student.landing', compact('student'));
                case 2:
                    $supervisor = Staff::with('user', 'user.religion')->where('user_id', $user->id)->firstOrFail();
                    return view('supervisor.landing', compact('supervisor'));
                case 3:
                    $user_id = User::pluck('id');
                    $submission_type = Thesis::pluck('submission_type');
                    $staff = User::with('religion')->where('id', $user->id)->firstOrFail();
                    return view('staff.landing', compact('staff','user_id', 'submission_type'));
                case 4:
                    $dean = User::with('religion')->where('id', $user->id)->firstOrFail();
                    return view('dean.landing', compact('dean'));
                case 5:
                    $registrar = User::with('religion')->where('id', $user->id)->firstOrFail();
                    return view('registrar.landing', compact('registrar'));
                case 6:
                    $board = User::with('religion')->where('id', $user->id)->firstOrFail();
                    return view('boardOGS.landing', compact('board'));
                case 7:
                    $schoolAdmin = User::with('religion')->where('id', $user->id)->firstOrFail();
                    return view('schoolAdmin.landing', compact('schoolAdmin'));
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
        'role' => 'required|in:1,2,3,4,5,6,7',
        'date_of_birth' => 'nullable|date',
        'phone_number' => 'nullable|string|max:20',
        'gender' => 'nullable|exists:gender,id',
        'nationality' => 'nullable|exists:country,id',
        'religion' => 'nullable|exists:religion,id',
    ]);

    // Generate a random password
    $password = Str::random(12); // Adjust the length of the password as needed

    // Hash the password for storage
    $hashedPassword = Hash::make($password);

    // Handle profile picture upload
    $profilePath = null;
    if ($request->hasFile('profile')) {
        $profilePath = $request->file('profile')->store('images', 'public');
    }

    // Store user details and role-specific data
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
        'password' => $hashedPassword,
    ];

    // Create user
    $user = User::create($userData);

    // Create role-specific record
    if ($validatedData['role'] == 1) {
        // Student-specific fields
        $studentData = [
            'student_number' => $request->input('student_number'),
            'year_of_admission' => $request->input('year_of_admission'),
            'year_of_registration' => $request->input('year_of_registration'),
            'year_of_graduation' => $request->input('year_of_graduation'),
            'academic_status' => $request->input('academic_status'),
            'program_id' => $request->input('programme'),
            'user_id' => $user->id,
        ];

        // Create student
        Student::create($studentData);
    } elseif ($validatedData['role'] == 2) {
        // Supervisor-specific fields
        $curriculumVitaePath = null;
        if ($request->hasFile('curriculum_vitae')) {
            $curriculumVitaePath = $request->file('curriculum_vitae')->store('cv', 'public');
        }

        $supervisorData = [
            'curriculum_vitae' => $curriculumVitaePath,
            'school_id' => $request->input('school'),
            'user_id' => $user->id, // Associate with the created user
        ];

        // Create staff
        Staff::create($supervisorData);
    }

    // Send email to user with password and reset link
    $resetLink = URL::to('/login'); // Generate the normal link, one can reset once they access their account

    Mail::to($validatedData['email'])->send(new UserRegistered($password, $resetLink));

    // Redirect to landing page
    return redirect('/')->with('message', 'Registration successful! An email has been sent to this User with login details.');
}

    


    //Verify Registration OTP
    public function verifyRegistrationOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric',
        ]);
    
        $otp_code = session('otp_code');
        $userDetails = session('user_details');
        $role = $userDetails['role_id'] ?? null;  // Retrieve the role from the session
    
        if ($userDetails && $request->otp == $otp_code) {
            // OTP is valid, complete the registration process
    
            // Retrieve role-specific details from the session
            $studentDetails = session('student_details');
            $staffDetails = session('staff_details');
    
            // Create User
            $user = User::create($userDetails);
    
            // Clear the OTP code
            $user->otp_code = null;
            $user->save();
    
            // Create role-specific record if applicable
            if ($role == 1 && $studentDetails) {
                $studentDetails['user_id'] = $user->id;
                Student::create($studentDetails);
            } elseif ($role == 2 && $staffDetails) {
                $staffDetails['user_id'] = $user->id;
                Staff::create($staffDetails);
            }
    
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
            return redirect('/login')->with('error', 'Failed!!Wrong email or password')->with('showResetLink', true);
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
                     
        public function index(Request $request)
        {
            // Retrieve search query parameters from the request
            $searchQuery = $request->input('search');
            $roleId = $request->input('role_id');
            
            // Build a query to filter users based on the search query and role
            $userQuery = User::query();
            
            if ($searchQuery) {
                // Filter users by name
                $userQuery->where('name', 'like', '%' . $searchQuery . '%');
            }
        
            if ($roleId) {
                // Filter users by role
                $userQuery->where('role_id', $roleId);
            }
            
            // Retrieve users with pagination (20 users per page)
            $users = $userQuery->with('role')->paginate(20);
            
            // Retrieve all roles for the dropdown
            $roles = Role::all();
            
            // Return the view with users and roles data
            return view('auth.users', compact('users', 'roles'));
        }
        
        
        

        public function edit($id)
        {
            $user = User::findOrFail($id);
            $roles = Role::all();
            $genders = Gender::all();
            $countries = Country::all();
            $religions = Religion::all();
            $programs = Program::all();
            $schools = School::all();
            
            return view('auth.edit', compact('user','roles', 'genders', 'countries', 'religions', 'programs', 'schools'));
        }
        
        public function update(Request $request, $id)
        {
            $user = User::findOrFail($id);
            
            // Validate the request
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'role_id' => 'required|integer',
                'date_of_birth' => 'nullable|date',
                'gender_id' => 'nullable|integer',
                'country_id' => 'nullable|integer',
                'religion_id' => 'nullable|integer',
                'phone_number' => 'nullable|string|max:15',
                // Additional validation rules as needed
                'student_number' => 'nullable|required_if:role_id,1|string|max:255',
                'programme' => 'nullable|required_if:role_id,1|exists:programs,id',
                'school' => 'nullable|required_if:role_id,2|exists:schools,id',
                'curriculum_vitae' => 'nullable|file|mimes:pdf|max:2048',
            ]);
        
            // Handle profile picture upload if necessary
            if ($request->hasFile('profile')) {
                $profilePath = $request->file('profile')->store('profiles', 'public');
                $validatedData['profile'] = $profilePath;
            }
        
            // Update user data
            $user->update($validatedData);
        
            // Handle additional fields based on role
            if ($user->role_id == 1) {
                // Update student-specific fields
                $student = $user->student;
                if ($student) {
                    $student->update([
                        'student_number' => $request->input('student_number'),
                        'program_id' => $request->input('programme'),
                    ]);
                }
            } elseif ($user->role_id == 2) {
                // Update supervisor-specific fields
                // Assuming 'curriculum_vitae' is related to supervisor's specific data
                $supervisor = $user->supervisor;
                if ($supervisor) {
                    $supervisor->update([
                        // Add relevant fields here
                    ]);
                }
            }
        
            return redirect()->route('users.index')->with('success', 'User updated successfully!');
        }
        
        
        
}