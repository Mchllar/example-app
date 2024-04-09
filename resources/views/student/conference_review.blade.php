<x-layout>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                /*text-align: center; /* Center align text */
            }

            h2,h3 {
                text-align: center; /* Center align the header */
                font-size: 20px; /* Set font size */
                margin-top: 20px; /* Add top margin for spacing */
            }

            form {
                width: 60%;
                max-width: 600px; /* Limit form width for better readability */
                margin: 20px auto; /* Center the form horizontally with top and bottom margin */
                padding: 20px; /* Add padding for better appearance */
                border: 1px solid #ccc; /* Add border for form container */
                border-radius: 10px; /* Add border radius for form container */
                background-color: #f2f2f2; /* Gray background color */
            }

            textarea {
                width: 100%; /* Set textarea width to match the form width */
                box-sizing: border-box; /* Include padding and border in the width calculation */
                resize: vertical; /* Allow vertical resizing of the textarea */
                border: 1px solid #ccc; /* Add border to define the textarea frame */
                padding: 5px; /* Add padding for better appearance */
            }

            button[type="submit"] {
                display: block;
                margin: 20px auto; /* Center the button horizontally with top and bottom margin */
                padding: 10px 20px;
                background-color: #45a049; /* Set button color to red */
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease; /* Add transition for smooth color change */
            }

            button[type="submit"]:hover {
                background-color:green; /* Change button color to blue when hovered over */
            }

            a {
                text-decoration: underline; /* Underline the link */
                color: blue; /* Set link color to blue */
            }

            a:hover {
                color: darkblue; /* Change link color to dark blue when hovered over */
            }

            h5 {
                color: red; 
                text-align: center; 

            }
  
        </style>
    </head>
    <body>
       
    <h2>CONFERENCE REVIEW CRITERIA</h2>
        <h3 class="submission-instructions">Submission Instructions:</h3>
            <ol>
                <li style="text-align: center;">1. Download and fill the criteria form. <a href="{{ url('https://sgs.strathmore.edu/uploads/downloads/Strathmore%20University_Conference%20Review%20Criteria.rtf') }}"></br>Click Here</a></li>
                <li style="text-align: center;">2. Upload the completed document.</li>
            </ol>
            <h5>(Upload PDF documents ONLY.)</h5>

        <form action="{{ route('review.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <input type="file" id="file_upload" name="file_upload" accept=".pdf">
            </div>
            <div>
                <label for="comments">Comments: (Provide the written evidence here especially on the eight (8) mandatory requirements)</label><br>
                <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
       

    </body>
</x-layout>
