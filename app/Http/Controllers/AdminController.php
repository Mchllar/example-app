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

    public function submitReportsAndMinutes(Request $request, Thesis $thesis) {
        $request->validate([
            'reports' => 'nullable|file|mimes:pdf',
            'minutes' => 'nullable|file|mimes:pdf',
        ]);
    
        // Handle report file upload
        if ($request->hasFile('reports')) {
            $reportFile = $request->file('reports');
            $reportPath = $reportFile->getClientOriginalName();
            $reportFile->move(public_path('examination_reports'), $reportPath);
            
            // Create or update report record
            ThesesReports::updateOrCreate(
                ['submission_id' => $thesis->id],
                ['report' => $reportPath]
            );

        }
    
        // Handle minutes file upload
        if ($request->hasFile('minutes')) {
            $minutesFile = $request->file('minutes');
            $minutesPath = $minutesFile->getClientOriginalName();
            $minutesFile->move(public_path('minutes'), $minutesPath);

            // Create or update minutes record
            ThesesMinutes::updateOrCreate(
                ['submission_id' => $thesis->id],
                ['minutes' => $minutesPath]
            );
        }
    
        $thesis->save(); 
    
        return redirect('adminThesis')->with('message', 'Reports and minutes submitted successfully.');
    }

}
