<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\ProgressReportController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

// Landing Page Route
//Route::get('/', function () {    return view('landing');})->name('landing')->middleware('auth');
// Landing Page Route
Route::get('/', [UserController::class, 'showLandingPage'])->name('landing')->middleware('auth');


//ALL USER AUTH ROUTES
//Showing the register form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');


//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Authenticate
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Register
//Storing users in database
Route::post('/users', [UserController::class, 'store']);

//2fa
Route::get('/verify-registration-otp', [UserController::class, 'regOTP']);
Route::post('/verify-registration-otp', [UserController::class, 'verifyRegistrationOtp']);
Route::get('/verify-login-otp', [UserController::class, 'logOTP']);
Route::post('/verify-login-otp', [UserController::class, 'verifyLoginOtp']);
//Resend OTP
Route::get('/resend-otp', [UserController::class, 'resendOtp'])->name('resend-otp'); 
Route::get('/resend-registration-otp', [UserController::class, 'resendRegOtp'])->name('resendRegOtp');


// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Conference Review Criteria
Route::match(['get', 'post'], '/conferenceReview', [UserController::class, 'conferenceReview']);

//Thesis Submission
Route::match(['get', 'post'], '/thesisSubmission', [UserController::class, 'thesisSubmission']);

//Notice of Intention to Submit Thesis
Route::match(['get', 'post'], '/noticeSubmission', [UserController::class, 'noticeSubmission']);

// Assign Supervisor
Route::get('/assign-supervisors', [SupervisorController::class, 'assignSupervisors'])->name('assign-supervisors');


// Change Supervisor
Route::get('/change-supervisor-request-form', [SupervisorController::class, 'showChangeSupervisorRequestForm'])->name('change-supervisor-request-form');
Route::post('/change-supervisor-request', [SupervisorController::class, 'submitChangeSupervisorRequest'])->name('change-supervisor-request');

// Progress Report Routes
Route::get('/progress_reports', [ProgressReportController::class, 'index'])->name('progress_reports.index');
Route::get('/progress_reports/create', [ProgressReportController::class, 'create'])->name('progress_reports.create');
Route::post('/progress_reports', [ProgressReportController::class, 'store'])->name('progress_reports.store');