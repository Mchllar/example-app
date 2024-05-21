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
                text-align: center;

               
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
            .required-star {
                color: red;
            }
            #thesisForm {
                width: 50%;
                margin: 0 auto;
            }
            #fileInputs,
            #submitBtn,
            #note {
                display: none;
            }
            .error-message {
        color: red;
        margin-top: 5px;
    }
        </style>
    </head>
    <body>  
        <h2> Thesis/Dissertation Submission</h2>
        <form id="thesisForm" action="{{ route('thesis.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->user()->student->id }}">

            <label for="submission_type">Submission Type:</label>
            <select name="submission_type" id="submission_type">
                <option value="0">Select Submission Type</option>
                <option value="1">Pre-Defense</option>
                <option value="2">Post-Defense</option>
            </select>
            <br>

            <div id="fileInputs">
                <div id="thesis_document_div">
                    <label for="thesis_document">Thesis Document<span id="thesis_star" class="required-star">*</span>:</label>
                    <input type="file" name="thesis_document" id="thesis_document">
                    <br>
                </div>

                <div id="correction_form_div">
                    <label for="correction_form">Correction Form<span id="correction_form_star" class="required-star">*</span>:</label>
                    <input type="file" name="correction_form" id="correction_form">
                    <br>
                </div>

                <div id="correction_summary_div">
                    <label for="correction_summary">Correction Summary<span id="correction_summary_star" class="required-star">*</span>:</label>
                    <input type="file" name="correction_summary" id="correction_summary">
                    <br>
                </div>
            </div>

            <div id="note">
                <h4 style="color: red;"> NB: Only submit PDF documents.</h4>
            </div>

            <div id="submitBtn">
                <button type="submit">Submit</button>
            </div>

            <div id="errorMessage" class="error-message" style="display: none;"></div>
        </form>

        <script>
            document.getElementById('submission_type').addEventListener('change', function() {
                var submissionType = this.value;
                var fileInputs = document.getElementById('fileInputs');
                var thesisStar = document.getElementById('thesis_star');
                var correctionFormStar = document.getElementById('correction_form_star');
                var correctionSummaryStar = document.getElementById('correction_summary_star');

                // Show/hide file inputs based on submission type
                if (submissionType === '1') { // Pre-Defense
                    fileInputs.style.display = 'block';
                    document.getElementById('thesis_document_div').style.display = 'block'; 
                    document.getElementById('correction_form_div').style.display = 'none'; 
                    document.getElementById('correction_summary_div').style.display = 'none';
                    thesisStar.style.color = 'red';
                    correctionFormStar.style.color = '';
                    correctionSummaryStar.style.color = '';
                } else if (submissionType === '2') { // Post-Defense
                    fileInputs.style.display = 'block';
                    document.getElementById('thesis_document_div').style.display = 'block'; 
                    document.getElementById('correction_form_div').style.display = 'block'; 
                    document.getElementById('correction_summary_div').style.display = 'block';
                    thesisStar.style.color = 'red';
                    correctionFormStar.style.color = 'red';
                    correctionSummaryStar.style.color = 'red';
                } else {
                    fileInputs.style.display = 'none'; 
                    thesisStar.style.color = '';
                    correctionFormStar.style.color = '';
                    correctionSummaryStar.style.color = '';
                }
            });
        </script>
        
        <script>
            document.getElementById('submission_type').addEventListener('change', function() {
                var submissionType = this.value;
                var fileInputs = document.getElementById('fileInputs');
                var note = document.getElementById('note');
                var submitBtn = document.getElementById('submitBtn');

                // Show/hide file inputs based on submission type
                if (submissionType === '1') { // Pre-Defense
                    fileInputs.style.display = 'block';
                    note.style.display = 'block';
                    submitBtn.style.display = 'block';
                } else if (submissionType === '2') { // Post-Defense
                    fileInputs.style.display = 'block';
                    note.style.display = 'block';
                    submitBtn.style.display = 'block';
                } else {
                    fileInputs.style.display = 'none'; 
                    note.style.display = 'none';
                    submitBtn.style.display = 'none';
                }
            });
        </script>

        <script>
            function validateForm() {
                var submissionType = document.getElementById('submission_type').value;
                var thesisDocument = document.getElementById('thesis_document').value;
                var correctionForm = document.getElementById('correction_form').value;
                var correctionSummary = document.getElementById('correction_summary').value;
                var errorMessage = document.getElementById('errorMessage');

                if (submissionType === '2') { // Post-Defense
                    if (thesisDocument === '' || correctionForm === '' || correctionSummary === '') {
                        errorMessage.innerHTML = 'It is required that you select all three documents for a post defense submission.';
                        errorMessage.style.display = 'block';
                        return false;
                    }
                }
                return true;
            }

            document.getElementById('submission_type').addEventListener('change', function() {
                var submissionType = this.value;
                var fileInputs = document.getElementById('fileInputs');
                var note = document.getElementById('note');
                var submitBtn = document.getElementById('submitBtn');
                var errorMessage = document.getElementById('errorMessage');

                errorMessage.style.display = 'none'; // Hide error message when submission type changes

                // Show/hide file inputs based on submission type
                if (submissionType === '1') { // Pre-Defense
                    fileInputs.style.display = 'block';
                    note.style.display = 'block';
                    submitBtn.style.display = 'block';
                } else if (submissionType === '2') { // Post-Defense
                    fileInputs.style.display = 'block';
                    note.style.display = 'block';
                    submitBtn.style.display = 'block';
                } else {
                    fileInputs.style.display = 'none'; 
                    note.style.display = 'none';
                    submitBtn.style.display = 'none';
                }
            });
        </script>


    </body>
</x-layout>