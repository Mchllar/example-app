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
                padding: 10px 24px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            button[type="submit"]:hover {
                background-color: #45a049;
            }

            #submission_type, label {
        display: block;
        text-align: center;
        margin: 0 auto;
    }
        </style>
    </head>
    <body>
               
        <!--  

        Lock editing 

        button to this current submission 
        
        Constraints for editing thesis submissions (Lock and unlock(0 or 1) button for each student-->
        <h2> Thesis/Dissertation Submission</h2>
        <form id="thesisForm" action="{{ route('thesis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="submission_type">Submission Type:</label>
            <select name="submission_type" id="submission_type">
                <option value="0">Select Submission Type</option>
                <option value="1">Pre-Defense</option>
                <option value="2">Post-Defense</option>
            </select>
            <br>
            <h4 style="color: red;"> NB: Only submit PDF documents.</h4>


            <div id="fileInputs" style="display: none;">
                <div id="thesis_document_div">
                    <label for="thesis_document">Thesis Document:</label>
                    <input type="file" name="thesis_document" id="thesis_document">
                    <br>
                </div>

                <div id="correction_form_div" style="display: none;">
                    <label for="correction_form">Correction Form:</label>
                    <input type="file" name="correction_form" id="correction_form">
                    <br>
                </div>

                <div id="correction_summary_div" style="display: none;">
                    <label for="correction_summary">Correction Summary:</label>
                    <input type="file" name="correction_summary" id="correction_summary">
                    <br>
                </div>
            </div>

            <button type="submit">Submit</button>
        </form>
  <!--      
<script>
        document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('thesisForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission behavior

        // Call a function to handle the submission check
        checkSubmissionBeforeSubmit();
    });
});

function checkSubmissionBeforeSubmit() {
    const submissionType = document.getElementById('submission_type').value;

    // Make an AJAX request to your backend
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `/check-submission?submission_type=${submissionType}`, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                
                // Handle the response
                if (response.canSubmit) {
                    if (confirm(response.message)) {
                        // If user confirms, proceed with form submission
                        document.getElementById('thesisForm').submit();
                    }
                } else {
                    alert(response.message); // Show error message
                }
            } else {
                // Handle error response
                console.error('Error fetching submission status:', xhr.status);
            }
        }
    };

    xhr.send();
}


</script>
-->
        <script>
            document.getElementById('submission_type').addEventListener('change', function() {
                var submissionType = this.value;
                var fileInputs = document.getElementById('fileInputs');
                var thesisDocumentDiv = document.getElementById('thesis_document_div');
                var correctionFormDiv = document.getElementById('correction_form_div');
                var correctionSummaryDiv = document.getElementById('correction_summary_div');

                // Show/hide file inputs based on submission type
                if (submissionType === '1') { // Pre-Defense
                    fileInputs.style.display = 'block';
                    thesisDocumentDiv.style.display = 'block'; 
                    correctionFormDiv.style.display = 'none'; 
                    correctionSummaryDiv.style.display = 'none';
                } else if (submissionType === '2') { // Post-Defense
                    fileInputs.style.display = 'block';
                    thesisDocumentDiv.style.display = 'block'; 
                    correctionFormDiv.style.display = 'block'; 
                    correctionSummaryDiv.style.display = 'block';
                } else {
                    fileInputs.style.display = 'none'; 
                }
            });
        </script>

    </body>
</x-layout>