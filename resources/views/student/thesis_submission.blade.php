<x-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thesis Submission</title>
</head>
<body>
    <form action="/thesisSubmission" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="thesis_document">Thesis/Dissertation Document:</label>
            <input type="file" id="thesis_document" name="thesis_document" accept=".pdf">
        </div>
       
        <button type="submit">Submit</button>
    </form>
</body>
</x-layout>
