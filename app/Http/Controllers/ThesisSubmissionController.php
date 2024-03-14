<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;

class ThesisSubmissionController extends Controller
{
    public function thesisSubmission() {
        return view('student.thesis_submission');
    }
}