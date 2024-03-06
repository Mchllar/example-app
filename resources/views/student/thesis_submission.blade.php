<x-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thesis Submission</title>
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

    <h2>Second Submission</h2>
    <h3>Submission Deadline</h3>
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
