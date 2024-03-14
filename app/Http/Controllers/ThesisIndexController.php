<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThesisIndexController extends Controller
{
    public function index() 
    {
        //Return View  of the Index Page for thesis submission
         return view('student.thesis_index');
    }

    public function submitThesis()
    {
        //Return s a form to create a new thesis record in the database
        return view('student.thesis_submission');
    }

    

}