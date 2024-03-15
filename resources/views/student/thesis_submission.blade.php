<x-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thesis Submission</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                padding: 20px;
                background-color: #f0f0f0;
            }

            h2 {
                margin-top: 30px;
                margin-bottom: 20px;
                font-size: 24px;
                color: #333;
               
            }

            h3 {
                margin-bottom: 10px;
                font-size: 18px;
                color: #333;
            }

            form {
                background-color: #fff;
                padding: 30px;
                border-radius: 8px;
                margin-bottom: 30px;
            }

            label {
                display: block;
                margin-bottom: 10px;
                font-weight: bold;
                color: #333;
            }

            input[type="file"] {
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 4px;
                padding: 10px;
                width: 100%;
            }

            button[type="submit"] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 24px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            button[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <!-- List of what has been uploaded -->
        <!-- Home page for thesis submission -->
        <!-- Preview the uploads -->
        <!-- Edit to upload a new file -->
        <!-- Lock editing **-->
        <!-- Supervisor Clearance default - Not approved for each supervisor -->
        <!-- Show supervisors' names -->
        <!-- Yes/no option to notify the supervisor (Send reminder date; show previously sent reminder) -->
        <!-- View the same table as the supervisor; List all supervisees, replace reminder button with approve submission -->
        <!--button to this current submission -->
        <!-- redirection to new page-->
        <!-- have a submission type drop down-->
        <!-- Constraints for editing thesis submissions (Lock and unlock(0 or 1) button for each student-->
        <!-- Thesis Submissions table-->
        <!-- Submission approvals table Submission ID, Supervisor ID, Submission type, Approval date-->
        <!-- Check if all supervisors appear in the submission table-->
        <h2> Thesis/Dissertation Submission</h2>
        <form action="/thesisSubmission" method="post" enctype="multipart/form-data" id="submissionForm">
    @csrf
    <div>
        <label for="selectOption" style="display: inline-block;">Which submission type are you making?:</label>
        <select id="selectOption" style="display: inline-block;">
            <option value="option1">Pre Defense</option>
            <option value="option2">Post Defense</option>
        </select>
    </div>

    <div id="thesisDocumentDiv" class="grayedOut">
        <label for="thesis_document2">Thesis/Dissertation Document:</label>
        <input type="file" id="thesis_document2" name="thesis_document2" accept=".pdf">
    </div>

    <div id="correctionFormDiv" class="grayedOut">
        <label for="correction_form">Thesis/Dissertation Correction Form:</label>
        <input type="file" id="correction_form" name="correction_form" accept=".pdf">
    </div>

    <div id="correctionSummaryDiv" class="grayedOut">
        <label for="correction_summary">Thesis/Dissertation Correction Summary:</label>
        <input type="file" id="correction_summary" name="correction_summary" accept=".pdf">
    </div>

    <button type="submit">Submit</button>
</form>

<script>
    // Wrap the script in a window.onload event to ensure it runs after the page is fully loaded
    window.onload = function () {
        // Initially gray out all divs
        var divsToGrayOut = document.querySelectorAll('.grayedOut');
        divsToGrayOut.forEach(function(div) {
            div.classList.add('grayedOut');
        });

        document.getElementById('selectOption').addEventListener('change', function() {
            var option = this.value;
            // Reset all divs to grayed out
            divsToGrayOut.forEach(function(div) {
                div.classList.add('grayedOut');
            });

            // Remove grayed out class based on selected option
            if (option === 'option1') {
                document.getElementById('thesisDocumentDiv').classList.remove('grayedOut');
                
            } else if (option === 'option2') {
                document.getElementById('thesisDocumentDiv').classList.remove('grayedOut');
                document.getElementById('correctionSummaryDiv').classList.remove('grayedOut');
                document.getElementById('correctionFormDiv').classList.remove('grayedOut');
            }
        });
    };
</script>

<style>
    .grayedOut {
        opacity: 0.5; /* Adjust opacity to gray out */
    }
</style>




   
    </body>
</x-layout>
