<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\ProgressReportController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\JournalSubmissionController;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\IntentionSubmissionController;
use App\Http\Controllers\ConferenceReviewController;
use App\Http\Controllers\AcademicLeaveRequestController;
use App\Http\Controllers\SupervisorAllocationController;
use App\Http\Controllers\SuperviseeController;




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
Route::get('/conferenceReview', [ConferenceReviewController::class, 'conferenceReview'])->name('conference.review');
Route::get('/review/create', [ConferenceReviewController::class, 'create'])->name('review.create');
Route::post('/reviewSubmit', [ConferenceReviewController::class, 'store'])->name('review.store');
Route::post('/review.approval', [ConferenceReviewController::class, 'approve'])->name('criteria.approval');
Route::get('/review.record', [ConferenceReviewController::class, 'index'])->name('review.record');

//Notice of Intention to Submit Thesis
Route::get('/noticeSubmission', [IntentionSubmissionController::class, 'noticeSubmission'])->name('notice.submission');
Route::get('/notice/create', [IntentionSubmissionController::class, 'create'])->name('notice.create');
Route::post('/noticeSubmit', [IntentionSubmissionController::class, 'store'])->name('notice.store');

// Conference Submission
Route::get('/conferenceSubmission', [ConferenceController::class, 'conferenceSubmission'])->name('conferenceSubmission');
Route::get('/conference/create', [ConferenceController::class, 'create'])->name('conference.create');
Route::post('/conferenceSubmit', [ConferenceController::class, 'store'])->name('conference.store');
//Route::get('/conferenceRecords', [ConferenceController::class, 'records'])->name('conference.records')->middleware('auth');
Route::get('/conference.index', [ConferenceController::class, 'index'])->name('conference.index');

//Journal Submission
Route::get('/journalSubmission', [JournalSubmissionController::class, 'journalSubmission'])->name('journalSubmission');
Route::get('/journal/create', [JournalSubmissionController::class, 'create'])->name('journal.create');
Route::post('/journalSubmit', [JournalSubmissionController::class, 'store'])->name('journal.store');
Route::get('/journal.index', [JournalSubmissionController::class, 'index'])->name('journal.index')->middleware('auth');

//Thesis
Route::get('/thesis.index', [ThesisController::class, 'index'])->name('thesis.index');
Route::get('/thesisSubmission', [ThesisController:: class, 'thesisSubmission'])->name('thesis.submission');
Route::get('/thesis/create', [ThesisController::class, 'create'])->name('thesis.create');
Route::post('/thesisSubmit', [ThesisController::class, 'store'])->name('thesis.store');
Route::post('/thesis/{id}', [ThesisController::class, 'update'])->name('thesis.update');
Route::post('/thesis.approval', [ThesisController::class, 'approveThesis'])->name('thesis.approval');
Route::get('/Reminder', [ThesisController::class, 'Reminder'])->name('thesis.reminder');
Route::post('/sendReminder', [ThesisController::class, 'sendReminder'])->name('thesis.emails');


//Supervisees
Route::get('/view.supervisee', [SuperviseeController::class, 'viewSupervisee'])->name('view.supervisee');

// Progress Report Routes
Route::get('/progress_reports', [ProgressReportController::class, 'index'])->name('progress_reports.index');
Route::get('/progress_reports/create', [ProgressReportController::class, 'create'])->name('progress_reports.create');
Route::post('/progress_reports', [ProgressReportController::class, 'store'])->name('progress_reports.store');
Route::get('/progress_reports/sectionA', [ProgressReportController::class, 'sectionA'])->name('progress_reports.sectionA');
Route::post('/progress_reports/storeSectionA', [ProgressReportController::class, 'storeSectionA'])->name('progress_reports.storeSectionA');
Route::get('/progress_reports/sectionB', [ProgressReportController::class, 'sectionB'])->name('progress_reports.sectionB');
Route::post('/progress_reports/storeSectionB', [ProgressReportController::class, 'storeSectionB'])->name('progress_reports.storeSectionB');
Route::get('/progress_reports/sectionC', [ProgressReportController::class, 'sectionC'])->name('progress_reports.sectionC');
Route::post('/progress_reports/storeSectionC', [ProgressReportController::class, 'storeSectionC'])->name('progress_reports.storeSectionC');
Route::get('/progress_reports/sectionD', [ProgressReportController::class, 'sectionD'])->name('progress_reports.sectionD');
Route::post('/progress_reports/storeSectionD', [ProgressReportController::class, 'storeSectionD'])->name('progress_reports.storeSectionD');
Route::get('/progress_reports/final_submission', [ProgressReportController::class, 'showFinalSubmissionPage'])->name('progress_reports.final_submission');
Route::post('/progress_reports/finalSubmission', [ProgressReportController::class, 'finalSubmission'])->name('progress_reports.finalSubmission');

//Academic Request
Route::get('/academic_leave/create', [AcademicLeaveRequestController::class, 'create'])->name('academic_leave.create');
Route::post('/academic_leave/store', [AcademicLeaveRequestController::class, 'store'])->name('academic_leave.store');
Route::get('/academic_leave/approve', [AcademicLeaveRequestController::class, 'approve'])->name('academic_leave.approve');
Route::post('/academic_leave/storeApprove', [AcademicLeaveRequestController::class, 'storeApprove'])->name('academic_leave.storeApprove');
Route::get('/academic_leave/view', [AcademicLeaveRequestController::class, 'viewRequests'])->name('academic_leave.view');

// Define routes for SupervisorAllocationController
Route::get('/supervisorAllocation', [SupervisorAllocationController::class, 'supervisorAllocation'])->name('supervisorAllocation');
Route::get('/allocation', [SupervisorAllocationController::class, 'allocation'])->name('allocation');
Route::post('/allocation/store', [SupervisorAllocationController::class, 'store'])->name('allocation.store');
Route::get('/changeSupervisor',[SupervisorAllocationController::class, 'changeSupervisor'])->name('changeSupervisor');
Route::post('/changeSupervisor/store',[SupervisorAllocationController::class, 'storeChangeSupervisor'])->name('changeSupervisor.store');
Route::get('/review-change-supervisor-requests', [SupervisorAllocationController::class, 'reviewChangeSupervisorRequests'])->name('reviewChangeSupervisorRequests');
Route::get('/viewStudentForm/{studentId}', [SupervisorAllocationController::class, 'viewStudentForm'])->name('viewStudentForm');
Route::post('/storeSchoolApproval',[SupervisorAllocationController::class, 'storeSchoolApproval'])->name('storeSchoolApproval');
Route::post('/storeBoardApproval',[SupervisorAllocationController::class, 'storeBoardApproval'])->name('storeBoardApproval');
Route::post('/storeDirectApproval',[SupervisorAllocationController::class, 'storeDirectorApproval'])->name('storeDirectorApproval');