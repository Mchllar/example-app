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
        <h2>First Submission</h2>
        <form action="/thesisSubmission" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="thesis_document">Thesis/Dissertation Document:</label>
                <input type="file" id="thesis_document" name="thesis_document" accept=".pdf">
            </div>
           
            <button type="submit">Submit</button>
        </form>

        <h2>Final Submission</h2>
        <form action="/thesisSubmission" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="thesis_document2">Thesis/Dissertation Document:</label>
                <input type="file" id="thesis_document2" name="thesis_document2" accept=".pdf">
            </div>

            <div>
                <label for="correction_form">Thesis/Dissertation Correction Form:</label>
                <input type="file" id="correction_form" name="correction_form" accept=".pdf">
            </div>

            <div>
                <label for="correction_summary">Thesis/Dissertation Correction Summary:</label>
                <input type="file" id="correction_summary" name="correction_summary" accept=".pdf">
            </div>     

            <button type="submit">Submit</button>
        </form>
    </body>
</x-layout>
