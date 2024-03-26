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
    <!-- Step 2 Form -->
    <!-- This view will contain the form fields for step 2 -->
    <form method="POST" action="{{ route('progress_reports.storeSectionB') }}" class="form-container max-w-3xl mx-auto px-4 py-8">
        @csrf
    <div class="form-container max-w-3xl mx-auto px-4 py-8">
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
                Complete Student's Section
            </button>
        </div>
    </div>
    </div>
    </form>
</x-layout>
