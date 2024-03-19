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
    </style>
    <div class="max-w-3xl mx-auto px-4 py-8">
        <!-- SECTION A: GENERAL INFORMATION -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-4">SECTION A: GENERAL INFORMATION</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="border border-gray-200 rounded p-2 w-full">
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="border border-gray-200 rounded p-2 w-full">
                </div>
                <div>
                    <label for="tel">Tel</label>
                    <input type="text" id="tel" name="tel" class="border border-gray-200 rounded p-2 w-full">
                </div>
                <div>
                    <label for="programme">Programme</label>
                    <input type="text" id="programme" name="programme" class="border border-gray-200 rounded p-2 w-full">
                </div>
                <div>
                    <label for="school_institute">School/Institute</label>
                    <input type="text" id="school_institute" name="school_institute" class="border border-gray-200 rounded p-2 w-full">
                </div>
                <div>
                    <label for="mode_of_study">Mode of Study</label><br>
                    <select id="mode_of_study" name="mode_of_study" class="form-select border border-gray-200 rounded p-2">
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                    </select>
                </div>
                <div>
                    <label for="principal_supervisor">Principal Supervisor</label>
                    <input type="text" id="principal_supervisor" name="principal_supervisor" class="border border-gray-200 rounded p-2 w-full">
                </div>
                <div>
                    <label for="lead_supervisor">Lead Supervisor</label>
                    <input type="text" id="lead_supervisor" name="lead_supervisor" class="border border-gray-200 rounded p-2 w-full">
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Next Page
                    </button>
                </div>
            </div>
        </div>

        <!-- SECTION B: STUDENT REPORT ON PROGRESS -->
        <div class="mb-8">
            <h2 class="text-lg font-semibold mb-4">SECTION B: STUDENT REPORT ON PROGRESS</h2>
            <div>
                <label for="goals_set">a) Goals Set for Reporting Period</label>
                <textarea id="goals_set" name="goals_set" class="border border-gray-200 rounded p-2 w-full"></textarea>
            </div>
            <div class="mt-4">
                <label for="progress_report">b) Comment on Progress</label>
                <textarea id="progress_report" name="progress_report" class="border border-gray-200 rounded p-2 w-full"></textarea>
            </div>
            <div class="mt-4">
                <label for="problems_issues">c) Problems or Issues</label>
                <textarea id="problems_issues" name="problems_issues" class="border border-gray-200 rounded p-2 w-full"></textarea>
            </div>
            <div class="mt-4">
                <label for="agreed_goals">d) Agreed Goals for Next Six Months</label>
                <textarea id="agreed_goals" name="agreed_goals" class="border border-gray-200 rounded p-2 w-full"></textarea>
            </div>
            <div class="mt-4">
                <label for="progress_rating">e) Progress Rating</label><br>
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
    <h2 class="text-lg font-semibold mb-4">SECTION C: SUPERVISOR COMMENTS ON PROGRESS</h2>
    <p style="font-weight: bold; color: red;">(To be completed by the Supervisors in consultation with the Student)</p><br>
    <ol>
        <li>(a) Is this student working at a rate, which will allow them to complete his or her thesis by the planned completion date?</li><br>
        <input type="text" id="completion_rate" name="completion_rate" class="border border-gray-200 rounded p-2 w-full" placeholder="Enter completion rate">
        <li>(b) Please rate the student’s progress in the last six months in relation to their goals and work plan</li><br>
        <ul>
            <li><label><input type="radio" name="progress_rating" value="significantly_more">Significantly more than planned</label></li>
            <li><label><input type="radio" name="progress_rating" value="less_than">Less than planned</label></li>
            <li><label><input type="radio" name="progress_rating" value="a_little_more">A little more than planned</label></li>
            <li><label><input type="radio" name="progress_rating" value="a_lot_less">A lot less than planned</label></li>
            <li><label><input type="radio" name="progress_rating" value="about_what_was_planned">About what was planned</label></li>
            <li><label><input type="radio" name="progress_rating" value="no_progress">No progress has been made</label></li>
        </ul><br>
        <li>(c) i.)How much of the thesis has been written (in percentage terms)?</li>
        <input type="number" id="thesis_completion_percentage" name="thesis_completion_percentage" min="0" max="100" placeholder="Percentage" class="border-solid border border-gray-300 rounded-md p-2 mt-2"><br>
        <li> ii.)How much longer do you estimate it will take to complete?</li>
        <input type="text" id="completion_estimation" name="completion_estimation" placeholder="Estimation for completion"class="border-solid border border-gray-300 rounded-md p-2 mt-2"><br>
        <li>(d) If there are problems, please indicate what steps are being taken to address them.</li>
        <textarea rows="5" id="problems_addressed" name="problems_addressed" class="border border-gray-200 rounded p-2 w-full" placeholder="Enter steps being taken to address problems"></textarea>
        <li>(e) Do you have any concerns about this student or his or her work?</li>
        <textarea rows="5" id="concerns_about_student" name="concerns_about_student" class="border border-gray-200 rounded p-2 w-full" placeholder="Enter any concerns about the student or their work"></textarea>
        <li>(f) If the candidate is in their last six months of candidature, please indicate whether the thesis shows evidence that the candidate has developed each of the generic attributes of a good thesis.</li>
        <p>These are listed below. Rate each on a scale of 1 – 5, where 1 = unsatisfactory and 5 = very good.</p>
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
        </table>
        <li>(g) Please comment briefly on the aspects of the thesis you consider inadequate.</li>
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
    <h2 class="text-lg font-semibold mb-4">SECTION D: OFFICE OF GRADUATE STUDIES</h2>
    <p style="font-weight: bold; color: black;">Student progress</p><br>
    <p style="font-weight: bold; color: red;">*Please read carefully the previous sections that have been completed by the student and supervisors. If you agree that satisfactory progress has been made during the period covered by the report, and that the future plans are appropriate and that no special action is needed, please complete below. If progress is not satisfactory, complete the relevant section below.</p><br>
    <p>a.)Progress: Has progress been satisfactory in the context of the student completing their studies successfully and on time?</p>
    <ul>
        <li><label><input type="radio" name="progress_satisfactory" value="yes">Yes</label></li>
        <li><label><input type="radio" name="progress_satisfactory" value="no">No</label></li>
    </ul><br>
    <p>b.)Unsatisfactory progress and action</p><br>
    <p>If any aspect of student performance is unsatisfactory, please identify what is wrong. Recommendations on student progression (select one option)</p><br>
    <ul>
        <li><label><input type="radio" name="registration_recommendation" value="continued">Continued registration</label></li>
        <li><label><input type="radio" name="registration_recommendation" value="conditions_attached">Continued registration with conditions attached</label></li>
        <li><label><input type="radio" name="registration_recommendation" value="suspend_registration">Suspend registration</label></li>
        <li><label><input type="radio" name="registration_recommendation" value="change_status">Change status from full-time and part-time registration</label></li>
        <li><label><input type="radio" name="registration_recommendation" value="terminate_registration">Terminate registration</label></li>
        <li><label><input type="radio" name="registration_recommendation" value="write_up_thesis">Student to write-up and submit MPhil thesis</label></li>
        <li><label><input type="radio" name="registration_recommendation" value="refer_to_board">Refer to Board of Graduate Studies for further deliberation</label></li>
        <li><label><input type="radio" name="registration_recommendation" value="other_recommendation">Any other recommendation</label></li>
    </ul><br>
<div class="mb-6">
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
      Complete
    </button>
  </div>
    </div>
</x-layout>