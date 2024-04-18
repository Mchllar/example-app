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
    <form method="POST" action="{{ route('progress_reports.storeSectionC') }}" class="form-container max-w-3xl mx-auto px-4 py-8">
        @csrf
        <input type="hidden" name="student_id" value="{{ $studentId }}">
        <input type="hidden" name="reporting_period" value="{{ $reportingPeriod }}">
    <div class="form-container max-w-3xl mx-auto px-4 py-8">
    <h2 class="text-lg font-semibold mb-4"><strong class="section-heading">SECTION C: SUPERVISOR COMMENTS ON PROGRESS</strong></h2>
    <p style="font-weight: bold; color: red;">(To be completed by the Supervisors in consultation with the Student)</p><br>
    <ol>
        <li><strong>(a) Is this student working at a rate, which will allow them to complete his or her thesis by the planned completion date?</strong></li><br>
            <label><input type="radio" name="students_completion_rate" value="1"> Yes</label><br>
            <label><input type="radio" name="students_completion_rate" value="0"> No</label><br>
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
          Complete Supervisor's Section
        </button>
      </div>
    </div>
    </form>
</x-layout>