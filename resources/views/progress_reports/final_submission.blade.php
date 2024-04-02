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
            text-align: center; /* Center align content */
            margin-top: 50px; /* Add space from the top */
        }

        .submit-button {
            padding: 15px 30px; /* Add padding to the button */
            font-size: 18px; /* Increase font size */
            background-color: #4CAF50; /* Green background color */
            color: white; /* White text color */
            border: none; /* Remove border */
            border-radius: 5px; /* Add border radius */
            cursor: pointer; /* Add pointer cursor on hover */
        }

        .submit-button:hover {
            background-color: #45a049; /* Darken background color on hover */
        }
    </style>
    <div class="form-container">
        <h1 class="text-lg font-bold mb-4 text-center">Confirm Final Submission</h1>
        <p class="text-lg font-bold mb-4 text-center">Please review progress report. Once submitted, it cannot be edited.</p>
        <form method="POST" action="{{ route('progress_reports.finalSubmission') }}">
            @csrf
            <button type="submit" class="submit-button">Finalize Progress Report</button>
        </form>
    </div>
</x-layout>
