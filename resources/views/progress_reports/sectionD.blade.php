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
    <!-- Final Step Form -->
    <!-- This view will contain the form fields for the final step -->
    <form method="POST" action="{{ route('progress_reports.storeSectionD') }}" class="form-container max-w-3xl mx-auto px-4 py-8">
        @csrf
        <input type="hidden" name="student_id" value="{{ $studentId }}">
        <input type="hidden" name="reporting_period" value="{{ $reportingPeriod }}">
    <div class="form-container max-w-3xl mx-auto px-4 py-8">
        <!-- SECTION D: OFFICE OF GRADUATE STUDIES -->
<div>
    <h2 class="text-lg font-semibold mb-4"><strong class="section-heading">SECTION D: OFFICE OF GRADUATE STUDIES</strong></h2>
    <p style="font-weight: bold; color: black;">Student progress</p><br>
    <p style="font-weight: bold; color: red;">*Please read carefully the previous sections that have been completed by the student and supervisors. If you agree that satisfactory progress has been made during the period covered by the report, and that the future plans are appropriate and that no special action is needed, please complete below. If progress is not satisfactory, complete the relevant section below.</p><br>
    <p><strong>a.) Progress: Has progress been satisfactory in the context of the student completing their studies successfully and on time?</strong></p>
    <ul>
        <li><label><input type="radio" name="dir_progress_satisfaction" value="1">Yes</label></li>
        <li><label><input type="radio" name="dir_progress_satisfaction" value="2">No</label></li>
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
      Complete Form
    </button>
  </div>
    </div>
    </form>
</x-layout>
