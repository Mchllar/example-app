<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;

class ConferenceReviewController extends Controller
{
    public function conferenceReview() {
        return view('student.conference_review');
    }
}