<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Models\ThesesReports;
use App\Models\ThesesMinutes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{
    public function admin() {

        $thesis = Thesis::with('student') 
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('staff.thesis_admin', compact('thesis'));
    }

    public function submitReports(Request $request, Thesis $thesis)
    {
        $request->validate([
            'report' => 'required|file|mimes:pdf',
        ]);

        if ($request->hasFile('report')) {
            $reportFile = $request->file('report');
            $reportPath = $reportFile->getClientOriginalName();
            
            $reportFile->move(public_path('examination_reports'), $reportPath);

            ThesesReports::updateOrCreate(
                ['submission_id' => $thesis->id],
                ['report' => $reportPath]
            );

            return redirect()->route('thesis.admin')->with('message', 'Report submitted successfully.');
        } 
        else {
            return redirect()->route('thesis.admin')->with('failMessage', 'Submission Failed.');

        }

    }

    public function submitMinutes(Request $request, Thesis $thesis)
    {
        // Validate the incoming request
        $request->validate([
            'minutes' => 'required|file|mimes:pdf',
        ]);

        if ($request->hasFile('minutes')) {
            $minutesFile = $request->file('minutes');
            $minutesPath = $minutesFile->getClientOriginalName();
            
            $minutesFile->move(public_path('minutes'), $minutesPath);

            ThesesMinutes::updateOrCreate(
                ['submission_id' => $thesis->id],
                ['minutes' => $minutesPath]
            );

            return redirect()->route('thesis.admin')->with('message', 'Minutes submitted successfully.');
        } else {
            return redirect()->route('thesis.admin')->with('error', 'No file uploaded.');
        }

        }

}  


