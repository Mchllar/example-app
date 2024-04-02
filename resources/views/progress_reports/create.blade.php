<x-layout>
    <style>
        /* CSS to style table headings */
        th {
            font-weight: semibold;
            background-color: #e5e7eb; /* Grey background */
            border: 2px solid black; /* Visible borders */
        }

        /* CSS to change link color to red when hovered over */
        a:hover {
            color: red;
        }

        /* Custom CSS to style sections in green color */
        .section-heading {
            color: green;
        }

        .form-container {
            background-color: #f3f4f6; /* Grey background */
            padding: 20px; /* Add padding for better visual appearance */
        }
    </style>
    <form method="POST" action="{{ route('progress_reports.store') }}" class="form-container max-w-3xl mx-auto px-4 py-8">
        @csrf
    <div class="form-container max-w-3xl mx-auto px-4 py-8">
        <!-- SECTION A: GENERAL INFORMATION -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-4"><strong class="section-heading">SECTION A: GENERAL INFORMATION</strong></h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="name"><strong>Name</strong ></label>
                    <input type="text" id="name" name="name" class="border border-gray-200 rounded p-2 w-full" value="{{ old('name', auth()->user()->name) }}">
                </div>
                <div>
                    <label for="email"><strong>Email</strong></label>
                    <input type="email" id="email" name="email" class="border border-gray-200 rounded p-2 w-full" value="{{ old('email', auth()->user()->email) }}">
                </div>
                <div>
                    <label for="tel"><strong>Tel</strong></label>
                    <input type="text" id="tel" name="tel" class="border border-gray-200 rounded p-2 w-full" value="{{ old('email', auth()->user()->phone_number) }}">
                </div>
                <div>
                    <label for="programme"><strong>Programme</strong></label>
                    <input type="text" id="programme" name="programme" class="border border-gray-200 rounded p-2 w-full" value="{{ old('programme', auth()->user()->student->program->name ?? '') }}">
                </div>
                <div>
                    <label for="school_institute"><strong>School/Institute</strong></label>
                    <input type="text" id="school_institute" name="school_institute" class="border border-gray-200 rounded p-2 w-full"  value="{{ old('programme', auth()->user()->student->program->school->name ?? '') }}">
                </div>
                <div>
                    <label for="mode_of_study"><strong>Mode of Study</strong></label><br>
                    <select id="mode_of_study" name="mode_of_study" class="form-select border border-gray-200 rounded p-2">
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                    </select>
                </div>
                <div>
                    <label for="principal_supervisor"><strong>Principal Supervisor</strong></label>
                    <select id="principal_supervisor" name="principal_supervisor" class="border border-gray-200 rounded p-2 w-full">
                        <option value="">Select Principal Supervisor</option>
                        @foreach($supervisors as $supervisor)
                            <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="lead_supervisor"><strong>Lead Supervisor</strong></label>
                    <select id="lead_supervisor" name="lead_supervisor" class="border border-gray-200 rounded p-2 w-full">
                        <option value="">Select Lead Supervisor</option>
                        @foreach($supervisors as $supervisor)
                            <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
            <h2 class="text-lg font-semibold mb-4"><strong class="section-heading">SECTION B: STUDENT REPORT ON PROGRESS</strong></h2>
            <div>
                <label for="goals_set"><strong>a) Goals Set for Reporting Period</strong></label>
                <textarea id="goals_set" name="goals_set" class="border border-gray-200 rounded p-2 w-full"></textarea>
            </div>
            <div class="mt-4">
                <label for="progress_report"><strong>b) Comment on Progress</strong></label>
                <textarea id="progress_report" name="progress_report" class="border border-gray-200 rounded p-2 w-full"></textarea>
            </div>
            <div class="mt-4">
                <label for="problems_issues"><strong>c) Problems or Issues</strong></label>
                <textarea id="problems_issues" name="problems_issues" class="border border-gray-200 rounded p-2 w-full"></textarea>
            </div>
            <div class="mt-4">
                <label for="agreed_goals"><strong>d) Agreed Goals for Next Six Months</strong></label>
                <textarea id="agreed_goals" name="agreed_goals" class="border border-gray-200 rounded p-2 w-full"></textarea>
            </div>
            <div class="mt-4">
                <label for="progress_rating"><strong>e) Progress Rating</strong></label><br>
                <select id="progress_rating" name="progress_rating" class="form-select border border-gray-200 rounded p-2">
                    <option value="significantly_more">Significantly More Than Planned</option>
                    <option value="less_than">Less Than Planned</option>
                    <option value="a_little_more">A Little More Than Planned</option>
                    <option value="a_lot_less">A Lot Less Than Planned</option>
                    <option value="about_what_was_planned">About What Was Planned</option>
                    <option value="no_progress">No Progress Has Been Made</option>
                </select>
            </div><br>
            <div class="mb-6">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Complete Report
                </button>
            </div>
        </div>

        <!-- SECTION C: SUPERVISOR COMMENTS ON PROGRESS -->
<div class="mb-8">
    <h2 class="text-lg font-semibold mb-4"><strong class="section-heading">SECTION C: SUPERVISOR COMMENTS ON PROGRESS</strong></h2>
    <p style="font-weight: bold; color: red;">(To be completed by the Supervisors in consultation with the Student)</p><br>
    <ol>
        <li><strong>(a) Is this student working at a rate, which will allow them to complete his or her thesis by the planned completion date?</strong></li><br>
        <input type="text" id="completion_rate" name="completion_rate" class="border border-gray-200 rounded p-2 w-full" placeholder="Yes or no, why?">
        <li><strong>(b) Please rate the student’s progress in the last six months in relation to their goals and work plan</strong></li><br>
        <ul>
            <li><label><input type="radio" name="progress_rating" value="significantly_more">Significantly more than planned</label></li>
            <li><label><input type="radio" name="progress_rating" value="less_than">Less than planned</label></li>
            <li><label><input type="radio" name="progress_rating" value="a_little_more">A little more than planned</label></li>
            <li><label><input type="radio" name="progress_rating" value="a_lot_less">A lot less than planned</label></li>
            <li><label><input type="radio" name="progress_rating" value="about_what_was_planned">About what was planned</label></li>
            <li><label><input type="radio" name="progress_rating" value="no_progress">No progress has been made</label></li>
        </ul><br>
        <li><strong>(c) i.)How much of the thesis has been written (in percentage terms)?</strong></li>
        <input type="number" id="thesis_completion_percentage" name="thesis_completion_percentage" min="0" max="100" placeholder="Percentage" class="border-solid border border-gray-300 rounded-md p-2 mt-2"><br>
        <li><strong> ii.)How much longer do you estimate it will take to complete?</strong></li>
        <input type="text" id="completion_estimation" name="completion_estimation" placeholder="Estimation for completion"class="border-solid border border-gray-300 rounded-md p-2 mt-2"><br>
        <li><strong>(d) If there are problems, please indicate what steps are being taken to address them.</strong></li>
        <textarea rows="5" id="problems_addressed" name="problems_addressed" class="border border-gray-200 rounded p-2 w-full" placeholder="Enter steps being taken to address problems"></textarea>
        <li><strong>(e) Do you have any concerns about this student or his or her work?</strong></li>
        <textarea rows="5" id="concerns_about_student" name="concerns_about_student" class="border border-gray-200 rounded p-2 w-full" placeholder="Enter any concerns about the student or their work"></textarea>
        <li><strong>(f) If the candidate is within their final six months of candidature, please indicate whether the thesis demonstrates evidence of the candidate having developed each of the generic attributes of a quality thesis. These attributes are listed below. 
            Please rate each attribute on a scale of 1 to 5, where 1 signifies unsatisfactory and 5 denotes very good.</strong></p>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Evidence that it forms a distinct contribution to the knowledge of the subject</td>
                    <td><input type="radio" name="item1" value="1"></td>
                    <td><input type="radio" name="item1" value="2"></td>
                    <td><input type="radio" name="item1" value="3"></td>
                    <td><input type="radio" name="item1" value="4"></td>
                    <td><input type="radio" name="item1" value="5"></td>
                </tr>
                <!-- Add other rows as needed -->
            </tbody>
        </table><br>
        <li><strong>(g) Please comment briefly on the aspects of the thesis you consider inadequate.</strong></li>
        <textarea rows="5" id="inadequate_aspects_comment" name="inadequate_aspects_comment" class="border border-gray-200 rounded p-2 w-full" placeholder="Enter comments on inadequate aspects of the thesis"></textarea>
    </ol><br>
    <div class="mb-6">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
          Complete
        </button>
      </div>
</div>

<!-- SECTION D: OFFICE OF GRADUATE STUDIES -->
<div>
    <h2 class="text-lg font-semibold mb-4"><strong class="section-heading">SECTION D: OFFICE OF GRADUATE STUDIES</strong></h2>
    <p style="font-weight: bold; color: black;">Student progress</p><br>
    <p style="font-weight: bold; color: red;">*Please read carefully the previous sections that have been completed by the student and supervisors. If you agree that satisfactory progress has been made during the period covered by the report, and that the future plans are appropriate and that no special action is needed, please complete below. If progress is not satisfactory, complete the relevant section below.</p><br>
    <p><strong>a.)Progress: Has progress been satisfactory in the context of the student completing their studies successfully and on time?</strong></p>
    <ul>
        <li><label><input type="radio" name="dir_progress_satisfaction" value="yes">Yes</label></li>
        <li><label><input type="radio" name="dir_progress_satisfaction" value="no">No</label></li>
    </ul><br>
    <p><strong>b.)Unsatisfactory progress and action. If any aspect of student performance is unsatisfactory, please identify what is wrong.</strong></p>
    <ul>
        <textarea rows="5" id="dir_unsatisfactory_progress_comments" name="dir_unsatisfactory_progress_comments" class="border border-gray-200 rounded p-2 w-full" placeholder="Enter comments on why you are dissatified with students progress."></textarea>
    </ul><br>
    <p><strong>c.)Recommendations on student progression (select one option)</strong></p><br>
    <ul>
        <li><label><input type="radio" name="dir_registration_recommendation" value="continued">Continued registration</label></li>
        <li><label><input type="radio" name="dir_registration_recommendation" value="conditions_attached">Continued registration with conditions attached</label></li>
        <li><label><input type="radio" name="dir_registration_recommendation" value="suspend_registration">Suspend registration</label></li>
        <li><label><input type="radio" name="dir_registration_recommendation" value="change_status">Change status from full-time and part-time registration</label></li>
        <li><label><input type="radio" name="dir_registration_recommendation" value="terminate_registration">Terminate registration</label></li>
        <li><label><input type="radio" name="dir_registration_recommendation" value="write_up_thesis">Student to write-up and submit MPhil thesis</label></li>
        <li><label><input type="radio" name="dir_registration_recommendation" value="refer_to_board">Refer to Board of Graduate Studies for further deliberation</label></li>
        <li><label><input type="radio" name="dir_registration_recommendation" value="other_recommendation">Any other recommendation</label></li>
    </ul><br>
<div class="mb-6">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
      Complete
    </button>
  </div>
    </div>
</x-layout>