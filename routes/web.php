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
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;





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

// List all users
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');

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


// Forgot Password
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset Password
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

// Display the edit form
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('auth.edit')->middleware('auth');

// Update the user in the database
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');


// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//Conference Review Criteria
Route::get('/conference/review', [ConferenceReviewController::class, 'conferenceReview'])->name('conference.review')->middleware('auth');
Route::get('/review/create', [ConferenceReviewController::class, 'create'])->name('review.create')->middleware('auth');
Route::post('/review/submit', [ConferenceReviewController::class, 'store'])->name('review.store')->middleware('auth');
Route::post('/review/approval', [ConferenceReviewController::class, 'approve'])->name('criteria.approval')->middleware('auth');
Route::get('/review/record', [ConferenceReviewController::class, 'index'])->name('review.record')->middleware('auth');

//Notice of Intention to Submit Thesis
Route::get('/notice/submission', [IntentionController::class, 'noticeSubmission'])->name('notice.submission')->middleware('auth');
Route::get('/notice/create', [IntentionController::class, 'create'])->name('notice.create')->middleware('auth');
Route::post('/notice/submit', [IntentionController::class, 'store'])->name('notice.store')->middleware('auth');
Route::get('/notice.record', [IntentionController::class, 'adminIndex'])->name('notice.record')->middleware('auth');

// Conference Submission
Route::get('/conference/submission', [ConferenceController::class, 'conferenceSubmission'])->name('conferenceSubmission')->middleware('auth');
Route::get('/conference/create', [ConferenceController::class, 'create'])->name('conference.create')->middleware('auth');
Route::post('/conference/submit', [ConferenceController::class, 'store'])->name('conference.store')->middleware('auth');
Route::get('/conference/index', [ConferenceController::class, 'index'])->name('conference.index')->middleware('auth');
Route::post('/conference/approval', [ConferenceController::class, 'approveConference'])->name('conference.approval')->middleware('auth');


//Journal Submission
Route::get('/journalSubmission', [JournalController::class, 'journalSubmission'])->name('journalSubmission')->middleware('auth');
Route::get('/journal/create', [JournalController::class, 'create'])->name('journal.create')->middleware('auth');
Route::post('/journal/submit', [JournalController::class, 'store'])->name('journal.store')->middleware('auth');
Route::get('/journal/index', [JournalController::class, 'index'])->name('journal.index')->middleware('auth');
Route::post('/journal/approval', [JournalController::class, 'approveJournal'])->name('journal.approval')->middleware('auth');


//Thesis
Route::get('/thesis.index', [ThesisController::class, 'index'])->name('thesis.index')->middleware('auth');
Route::get('/thesisSubmission', [ThesisController:: class, 'thesisSubmission'])->name('thesis.submission')->middleware('auth');
Route::get('/thesis/create', [ThesisController::class, 'create'])->name('thesis.create')->middleware('auth');
Route::post('/thesis/submit', [ThesisController::class, 'store'])->name('thesis.store')->middleware('auth');
//Route::post('/thesis/{id}', [ThesisController::class, 'update'])->name('thesis.update')->middleware('auth');
Route::post('/thesis/approval', [ThesisController::class, 'approveThesis'])->name('thesis.approve')->middleware('auth');
Route::get('/thesis.correction', [AdminController::class, 'correctionReminder'])->name('thesis.correction')->middleware('auth');
Route::post('/student/reminder', [AdminController::class, 'studentReminder'])->name('studentReminder')->middleware('auth');


//Reminder
Route::post('/sendReminder', [ReminderController::class, 'sendReminder'])->name('thesis.emails')->middleware('auth');
Route::post('/reminder', [ReminderController::class, 'reminder'])->name('send.reminder')->middleware('auth');

Route::post('/submit-reports/{thesis}', [AdminController::class, 'submitReports'])->name('admin.submit-reports')->middleware('auth');
Route::post('/submit-minutes/{thesis}', [AdminController::class, 'submitMinutes'])->name('admin.submit-minutes')->middleware('auth');
Route::get('/adminThesis', [AdminController::class, 'admin'])->name('thesis.admin')->middleware('auth');

//Defense
Route::get('/adminDefense', [AdminController::class, 'defenseRecords'])->name('admin.defense')->middleware('auth');


//Supervisee
Route::get('/view/supervisee', [SuperviseeController::class, 'viewSupervisee'])->name('view.supervisee')->middleware('auth');

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
Route::get('/progress_reports/clearStatus/{reportId}', [ProgressReportController::class, 'clearStatus'])->name('progress_reports.clearStatus');

//Academic Request
Route::get('/academic_leave/create', [AcademicLeaveRequestController::class, 'create'])->name('academic_leave.create')->middleware('auth');
Route::post('/academic_leave/store', [AcademicLeaveRequestController::class, 'store'])->name('academic_leave.store')->middleware('auth');
Route::get('/academic_leave/approve', [AcademicLeaveRequestController::class, 'approve'])->name('academic_leave.approve')->middleware('auth');
Route::post('/academic_leave/storeApprove', [AcademicLeaveRequestController::class, 'storeApprove'])->name('academic_leave.storeApprove')->middleware('auth');
Route::post('/academic_leave/facultyApprove', [AcademicLeaveRequestController::class, 'facultyApprove'])->name('academic_leave.facultyApprove')->middleware('auth');
Route::post('/academic_leave/ogsApprove', [AcademicLeaveRequestController::class, 'ogsApprove'])->name('academic_leave.ogsApprove')->middleware('auth');
Route::post('/academic_leave/registrarApprove', [AcademicLeaveRequestController::class, 'registrarApprove'])->name('academic_leave.registrarApprove')->middleware('auth');
Route::get('/academic_leave/view', [AcademicLeaveRequestController::class, 'viewRequests'])->name('academic_leave.view')->middleware('auth');
Route::post('/academic-leave/clear-status/{academicLeaveRequestId}', [AcademicLeaveRequestController::class, 'clearStatus'])->name('academic_leave.clearStatus');


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