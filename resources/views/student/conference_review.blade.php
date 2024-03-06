<x-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conference Review Criteria</title>
</head>
<body>
    <form action="/conferenceReview" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="review_document">Conference Review Criteria Document:</label>
            <input type="file" id="review_document" name="review_document" accept=".pdf">
        </div>
        <div>
            <label for="comments">Comments:</label><br>
            <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</x-layout>
