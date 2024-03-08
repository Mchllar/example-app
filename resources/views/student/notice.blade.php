<x-layout>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h3{
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="date"],
        input[type="text"],
        select {
            width: 100%;
            padding: 6px 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            text-align: justify;
            font-size: 16px;
            line-height: 1.5;
        }

        .form-container {
            width: 50%;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f2f2f2; /* Gray background color */

              
        }

        label span {
        color: blue; 
        }

    </style>
</head>
<body>
    
<img src="{{ asset('images/sgs_logo_dark.png') }}" alt="White logo" style="display: block; margin: 20px auto 0; width: 20%;">

<h2 style="text-align: center; font-size: 20px; ">NOTICE OF INTENTION TO SUBMIT THESIS</h2>
<div class="form-container">
    <h3 style="text-align: center; ">Section A:</h3>

<form action="/submit" method="post">
    <table>
            <th>Title of Thesis</th>
            <td><input type="text" name="thesis_title"></td>
        </tr>
        <tr>
            <th>Date intended to submit thesis</th>
            <td><input type="date" name="intended_submit_date"></td>
        </tr>
    </table>

    <p><i>PUBLICATIONS/CONFERENCE PAPERS: (Please the status of the following. Please note that without having a total of 3 papers as clarified in the PhD regulations, you are not eligible to graduate)</i></p>

      <table>
        <tr>
            <th>Date</th>
            <th>Journal</th>
            <th>Title of Paper</th>
            <th>Status of Paper</th>
        </tr>
        <tr>
            <td><input type="date" name="date"></td>
            <td><input type="text" name="journal"></td>
            <td><input type="text" name="title"></td>
            <td>
                <select name="status">
                    <option value="under review">Under Review</option>
                    <option value="accepted">Accepted</option>
                    <option value="published">Published</option>
                </select>
            </td>
        </tr>
    </table>

    <table>
        <tr>
            <th>Date</th>
            <th>Conference Title & Website</th>
            <th>Title of Paper Presentation</th>
            <th>Status of Paper</th>
        </tr>
        <tr>
            <td><input type="date" name="date"></td>
            <td><input type="text" name="conference"></td>
            <td><input type="text" name="title"></td>
            <td>
                <select name="status">
                    <option value="under review">Under Review</option>
                    <option value="accepted">Accepted</option>
                    <option value="published">Published</option>
                </select>
            </td>
        </tr>
    </table>

<h3>Section B</h3>
<h3 style="text-align: justify;">DECLARATION <br></h3>
<p>
    The work to be submitted has not previously been accepted in substance for any degree 
    and is not concurrently submitted in candidature for any degree. This thesis is the result 
    of my own independent work/investigation, except where otherwise stated. Other 
    sources are acknowledged by explicit references.
</p>

<!-- Add a checkbox for the user to affirm the declaration -->
<label for="declaration_checkbox">
    <input type="checkbox" id="declaration_checkbox" name="declaration_checkbox" required>
    <span style="color: blue;">I affirm the declaration above.</span>
</label>

<span id="error_message" style="color: red; display: none;">Please affirm the declaration.</span>
<span id="success_message" style="color: green; display: none;">Form submitted successfully!</span>

<input type="submit" value="Submit" onclick="validateForm()">


<script>
function validateForm() {
    var checkbox = document.getElementById("declaration_checkbox");
    var errorMessage = document.getElementById("error_message");
    var successMessage = document.getElementById("success_message");
    
    if (!checkbox.checked) {
        errorMessage.style.display = "inline"; // Show error message
        setTimeout(function(){ errorMessage.style.display = "none"; }, 3000); // Hide error message after 3 seconds
        return false; // Prevent form submission
    }
    
    successMessage.style.display = "inline"; // Show success message
    setTimeout(function(){ successMessage.style.display = "none"; }, 3000); // Hide success message after 3 seconds
    return true; // Allow form submission
}
</script>


</form>
</div>
</body>
</x-layout>
