<?php

namespace App\Http\Controllers;

use App\Models\Thesis;
use App\Models\ThesesReports;
use App\Models\ThesesMinutes;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function admin() {

        $thesis = Thesis::with('student') // Assuming 'student' is the relationship to the User model for the student
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('staff.thesis_admin', compact('thesis'));
    }

    public function submitReports(Request $request, Thesis $thesis)
    {
        $request->validate([
            'reports' => 'required|file|mimes:pdf',
        ]);

        if ($request->hasFile('reports')) {
            $reportFile = $request->file('reports');
            $reportPath = $reportFile->getClientOriginalName();
            $reportFile->move(public_path('examination_reports'), $reportPath);

            ThesesReports::updateOrCreate(
                ['submission_id' => $thesis->id],
                ['report' => $reportPath]
            );
        }

        return redirect()->route('adminThesis')->with('message', 'Report submitted successfully.');
    }

    public function submitMinutes(Request $request, Thesis $thesis)
    {
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
        }

        return redirect()->route('adminThesis')->with('message', 'Minutes submitted successfully.');
    }
}
    


