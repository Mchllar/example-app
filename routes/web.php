<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\ProgressReportController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\ThesisController;
use App\Http\Controllers\IntentionController;
use App\Http\Controllers\ConferenceReviewController;
use App\Http\Controllers\AcademicLeaveRequestController;
use App\Http\Controllers\SupervisorAllocationController;
use App\Http\Controllers\SuperviseeController;
use App\Http\Controllers\ReportingPeriodController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReminderController;





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
// Landing Page Route
Route::get('/', [UserController::class, 'showLandingPage'])->name('landing')->middleware('auth');


//ALL USER AUTH ROUTES
//Showing the register form
Route::get('/register', [UserController::class, 'register'])->middleware('auth');


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
Route::get('/resend-otp', [UserController::class, 'resendOtp'])->name('resend-otp')->middleware('guest'); 
Route::get('/resend-registration-otp', [UserController::class, 'resendRegOtp'])->name('resendRegOtp');


// Route to show forgot password form
Route::get('/forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('password.forgot');
// Route to show reset password form
Route::get('/reset-password/{token}', [UserController::class, 'showResetPasswordForm'])->name('password.reset');
// Route to handle password reset
Route::post('/reset-password', [UserController::class, 'reset'])->name('password.update');
// Route to handle email for password reset
Route::post('/forgot-password', [UserController::class, 'email'])->name('password.email');


// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Conference Review Criteria
Route::get('/conferenceReview', [ConferenceReviewController::class, 'conferenceReview'])->name('conference.review');
Route::get('/review/create', [ConferenceReviewController::class, 'create'])->name('review.create');
Route::post('/reviewSubmit', [ConferenceReviewController::class, 'store'])->name('review.store');
Route::post('/review.approval', [ConferenceReviewController::class, 'approve'])->name('criteria.approval');
Route::get('/review.record', [ConferenceReviewController::class, 'index'])->name('review.record');

//Notice of Intention to Submit Thesis
Route::get('/noticeSubmission', [IntentionController::class, 'noticeSubmission'])->name('notice.submission');
Route::get('/notice/create', [IntentionController::class, 'create'])->name('notice.create');
Route::post('/noticeSubmit', [IntentionController::class, 'store'])->name('notice.store');
Route::get('/notice.record', [IntentionController::class, 'adminIndex'])->name('notice.record');

// Conference Submission
Route::get('/conferenceSubmission', [ConferenceController::class, 'conferenceSubmission'])->name('conferenceSubmission');
Route::get('/conference/create', [ConferenceController::class, 'create'])->name('conference.create');
Route::post('/conferenceSubmit', [ConferenceController::class, 'store'])->name('conference.store');
//Route::get('/conferenceRecords', [ConferenceController::class, 'records'])->name('conference.records')->middleware('auth');
Route::get('/conference.index', [ConferenceController::class, 'index'])->name('conference.index');
Route::post('/conference.approval', [ConferenceController::class, 'approveConference'])->name('conference.approval');


//Journal Submission
Route::get('/journalSubmission', [JournalController::class, 'journalSubmission'])->name('journalSubmission');
Route::get('/journal/create', [JournalController::class, 'create'])->name('journal.create');
Route::post('/journalSubmit', [JournalController::class, 'store'])->name('journal.store');
Route::get('/journal.index', [JournalController::class, 'index'])->name('journal.index')->middleware('auth');
Route::post('/journal.approval', [JournalController::class, 'approveJournal'])->name('journal.approval');


//Thesis
Route::get('/thesis.index', [ThesisController::class, 'index'])->name('thesis.index');
Route::get('/thesisSubmission', [ThesisController:: class, 'thesisSubmission'])->name('thesis.submission');
Route::get('/thesis/create', [ThesisController::class, 'create'])->name('thesis.create');
Route::post('/thesisSubmit', [ThesisController::class, 'store'])->name('thesis.store');
Route::post('/thesis/{id}', [ThesisController::class, 'update'])->name('thesis.update');
Route::post('/thesis.approval', [ThesisController::class, 'approveThesis'])->name('thesis.approval');
//Route::post('/sendReminder', [ThesisController::class, 'sendReminder'])->name('thesis.emails');

//Reminder
Route::post('/sendReminder', [ReminderController::class, 'sendReminder'])->name('thesis.emails');
Route::post('/reminder', [ReminderController::class, 'reminder'])->name('send.reminder');

Route::post('/submit-reports/{thesis}', [AdminController::class, 'submitReports'])->name('admin.submit-reports');
Route::post('/submit-minutes/{thesis}', [AdminController::class, 'submitMinutes'])->name('admin.submit-minutes');
Route::get('/adminThesis', [AdminController::class, 'admin'])->name('thesis.admin');

//Supervisee
Route::get('/view.supervisee', [SuperviseeController::class, 'viewSupervisee'])->name('view.supervisee')->middleware('auth');

// Progress Report Routes
Route::get('/progress_reports', [ProgressReportController::class, 'index'])->name('progress_reports.index')->middleware('auth');
Route::get('/progress_reports/create', [ProgressReportController::class, 'create'])->name('progress_reports.create')->middleware('auth');
Route::post('/progress_reports', [ProgressReportController::class, 'store'])->name('progress_reports.store')->middleware('auth');
Route::get('/progress_reports/sectionA', [ProgressReportController::class, 'sectionA'])->name('progress_reports.sectionA')->middleware('auth');
Route::post('/progress_reports/storeSectionA', [ProgressReportController::class, 'storeSectionA'])->name('progress_reports.storeSectionA')->middleware('auth');
Route::get('/progress_reports/sectionB', [ProgressReportController::class, 'sectionB'])->name('progress_reports.sectionB')->middleware('auth');
Route::post('/progress_reports/storeSectionB', [ProgressReportController::class, 'storeSectionB'])->name('progress_reports.storeSectionB')->middleware('auth');
Route::get('/progress_reports/sectionC/{studentId}/{reportingPeriod}', [ProgressReportController::class, 'sectionC'])->name('progress_reports.sectionC')->middleware('auth');
Route::post('/progress_reports/storeSectionC', [ProgressReportController::class, 'storeSectionC'])->name('progress_reports.storeSectionC')->middleware('auth');
Route::get('/progress_reports/sectionD/{studentId}/{reportingPeriod}', [ProgressReportController::class, 'sectionD'])->name('progress_reports.sectionD')->middleware('auth');
Route::post('/progress_reports/storeSectionD', [ProgressReportController::class, 'storeSectionD'])->name('progress_reports.storeSectionD')->middleware('auth');
Route::get('/progress_reports/updateReport', [ProgressReportController::class, 'updateReport'])->name('progress_reports.updateReport')->middleware('auth');
Route::get('/progress_reports/completeReport', [ProgressReportController::class, 'completeReport'])->name('progress_reports.completeReport')->middleware('auth');

//Academic Request
Route::get('/academic_leave/create', [AcademicLeaveRequestController::class, 'create'])->name('academic_leave.create')->middleware('auth');
Route::post('/academic_leave/store', [AcademicLeaveRequestController::class, 'store'])->name('academic_leave.store')->middleware('auth');
Route::get('/academic_leave/approve', [AcademicLeaveRequestController::class, 'approve'])->name('academic_leave.approve')->middleware('auth');
Route::post('/academic_leave/storeApprove', [AcademicLeaveRequestController::class, 'storeApprove'])->name('academic_leave.storeApprove')->middleware('auth');
Route::post('/academic_leave/facultyApprove', [AcademicLeaveRequestController::class, 'facultyApprove'])->name('academic_leave.facultyApprove')->middleware('auth');
Route::post('/academic_leave/ogsApprove', [AcademicLeaveRequestController::class, 'ogsApprove'])->name('academic_leave.ogsApprove')->middleware('auth');
Route::post('/academic_leave/registrarApprove', [AcademicLeaveRequestController::class, 'registrarApprove'])->name('academic_leave.registrarApprove')->middleware('auth');
Route::get('/academic_leave/view', [AcademicLeaveRequestController::class, 'viewRequests'])->name('academic_leave.view')->middleware('auth');

// Define routes for SupervisorAllocationController
Route::get('/supervisorAllocation', [SupervisorAllocationController::class, 'supervisorAllocation'])->name('supervisorAllocation')->middleware('auth');
Route::get('/supervisorStudentAllocation', [SupervisorAllocationController::class, 'supervisorStudentAllocation'])->name('supervisorStudentAllocation')->middleware('auth');
Route::get('/allocationStudent', [SupervisorAllocationController::class, 'allocationStudent'])->name('allocationStudent')->middleware('auth');
Route::get('/allocation', [SupervisorAllocationController::class, 'allocation'])->name('allocation')->middleware('auth');
Route::post('/allocation/store', [SupervisorAllocationController::class, 'store'])->name('allocation.store')->middleware('auth');
Route::get('/allocation/{id}/edit', [SupervisorAllocationController::class, 'edit'])->name('allocation.edit')->middleware('auth');
Route::put('/allocation/{id}', [SupervisorAllocationController::class, 'update'])->name('allocation.update')->middleware('auth');
Route::get('/changeSupervisor',[SupervisorAllocationController::class, 'changeSupervisor'])->name('changeSupervisor')->middleware('auth');
Route::post('/changeSupervisor/store',[SupervisorAllocationController::class, 'storeChangeSupervisor'])->name('changeSupervisor.store')->middleware('auth');
Route::get('/review-change-supervisor-requests', [SupervisorAllocationController::class, 'reviewChangeSupervisorRequests'])->name('reviewChangeSupervisorRequests')->middleware('auth');
Route::get('/viewStudentForm/{studentId}', [SupervisorAllocationController::class, 'viewStudentForm'])->name('viewStudentForm')->middleware('auth');
Route::post('/storeSchoolApproval',[SupervisorAllocationController::class, 'storeSchoolApproval'])->name('storeSchoolApproval')->middleware('auth');
Route::post('/storeBoardApproval',[SupervisorAllocationController::class, 'storeBoardApproval'])->name('storeBoardApproval')->middleware('auth');
Route::post('/storeDirectApproval',[SupervisorAllocationController::class, 'storeDirectorApproval'])->name('storeDirectorApproval')->middleware('auth');


Route::get('/reporting-periods', [ReportingPeriodController::class, 'index'])->name('reporting-periods.index')->middleware('auth');
Route::get('/reporting-periods/create', [ReportingPeriodController::class, 'create'])->name('reporting-periods.create')->middleware('auth');
Route::post('/reporting-periods', [ReportingPeriodController::class, 'store'])->name('reporting-periods.store')->middleware('auth');
Route::delete('/reporting-periods/{id}', [ReportingPeriodController::class, 'destroy'])->name('reporting-periods.destroy')->middleware('auth');