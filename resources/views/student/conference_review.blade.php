<x-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Conference Review Criteria</title>
        <style>
            body {
                background-color: #f0f0f0; /* Set a nice background color */
                display: flex;
                flex-direction: column;
                align-items: center;
                min-height: 100vh;
                margin: 0;
            }

            main {
                flex: 1;
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 50%;
                padding: 20px;
                box-sizing: border-box;
                border: 1px solid #ccc; /* Add border for a nice rectangle */
                border-radius: 10px; /* Add border radius for rounded corners */
                background-color: #fff; /* Set background color for the main container */
            }

            form {
                width: 100%;
                max-width: 600px; /* Limit form width for better readability */
            }

            textarea {
                 width: 100%; /* Set textarea width to match the form width */
                 box-sizing: border-box; /* Include padding and border in the width calculation */
                 resize: vertical; /* Allow vertical resizing of the textarea */
                border: 1px solid #ccc; /* Add border to define the textarea frame */
                padding: 5px; /* Add padding for better appearance */
                }


            button[type="submit"] {
                background-color: red; /* Set button color to red */
                color: white;
                padding: 5px 30px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease; /* Add transition for smooth color change */
            }

            button[type="submit"]:hover {
                background-color: blue; /* Change button color to blue when hovered over */
            }

            /* Style for underlining the "Submission Instructions" text */
            .submission-instructions {
                text-decoration: underline;
                margin-bottom: 20px; /* Add margin for spacing */
            }

            h2 {
                font-weight: bold; /* Make h3 tags bold */
                margin-bottom: 10px; /* Add space between h3 tags and the text below */
            }

            a {
                text-decoration: underline; /* Underline the link */
                color: blue; /* Set link color to blue */
            }

            a:hover {
                color: darkblue; /* Change link color to dark blue when hovered over */
            }
        </style>
    </head>
    <body>
        <header>
            <!-- Your header content goes here -->
        </header>
        <main>
            <h2>Conference Review Criteria Document:</h2>
            <h3 class="submission-instructions">Submission Instructions:</h3>
            <ol>
                <li>1. Download and fill the criteria form. <a href="{{ url('https://sgs.strathmore.edu/uploads/downloads/Strathmore%20University_Conference%20Review%20Criteria.rtf') }}"></br>Click Here</a></li>
                <li>2. Upload the completed document.</li>
            </ol>
            <p style="color: red;">(Upload PDF documents ONLY.)</p><br /><br />

            <form action="/conferenceReview" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <input type="file" id="review_document" name="review_document" accept=".pdf">
                </div>
                <div>
                    <label for="comments">Comments:</label><br>
                    <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </main>
        <footer>
            <!-- Your footer content goes here -->
        </footer>
    </body>
</x-layout>
