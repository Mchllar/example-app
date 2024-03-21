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
               
        <!-- Preview the uploads 

        Edit to upload a new file 

        Lock editing 

        Supervisor Clearance default - Not approved for each supervisor 

        Show supervisors' names 

        Yes/no option to notify the supervisor (Send reminder date; show previously sent reminder) 

        View the same table as the supervisor; List all supervisees, replace reminder button with approve submission 

        button to this current submission 

        redirection to new page
        
        Constraints for editing thesis submissions (Lock and unlock(0 or 1) button for each student

        Submission approvals table Submission ID, Supervisor ID, Submission type, Approval date

        Check if all supervisors appear in the submission table-->
        <h2> Thesis/Dissertation Submission</h2>

       <form action="{{ route('thesis.store') }}" method="POST" enctype="multipart/form-data">
            @csrf 
            <label for="submission_type">Submission Type:</label>
            <select name="submission_type" id="submission_type">
                <option value="pre_defense">Pre-Defense</option>
                <option value="post_defense">Post-Defense</option>
            </select>
            <br>

            <label for="thesis_document">Thesis Document:</label>
            <input type="file" name="thesis_document" id="thesis_document">
            <br>

            <label for="correction_form">Correction Form:</label>
            <input type="file" name="correction_form" id="correction_form">
            <br>

            <label for="correction_summary">Correction Summary:</label>
            <input type="file" name="correction_summary" id="correction_summary">
            <br>

            <button type="submit">Submit</button>
            </form>
    </body>
</x-layout>