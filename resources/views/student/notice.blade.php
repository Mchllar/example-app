<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intention Notice Form</title>
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

    </style>
</head>
<body>
<img src="{{ asset('images/sgs_logo_dark.png') }}" alt="White logo" style="display: block; margin: 20px auto 0; width: 20%;">

<h2 style="text-align: center; font-size: 20px; ">NOTICE OF INTENTION TO SUBMIT THESIS</h2>
<div class="form-container">
    <h3 style="text-align: center; ">Section A:</h3>

<form action="/submit" method="post">
    <table>
        <tr>
            <th>Student Name</th>
            <td><input type="text" name="student_name"></td>
        </tr>
        <tr>
            <th>Student Number</th>
            <td><input type="text" name="student_number"></td>
        </tr>
        <tr>
            <th>Faculty/School/Institute</th>
            <td><input type="text" name="faculty"></td>
        </tr>
        <tr>
            <th>Title of Degree</th>
            <td><input type="text" name="degree_title"></td>
        </tr>
        <tr>
            <th>Title of Thesis</th>
            <td><input type="text" name="thesis_title"></td>
        </tr>
        <tr>
            <th>Email Address</th>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <th>Phone no.</th>
            <td><input type="tel" name="phone"></td>
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
    <h3 style= "text-align: justify;">DECLARATION <br></h3>
    <p>
    The work to be submitted has not previously been accepted in substance for any degree 
    and is not concurrently submitted in candidature for any degree. This thesis is the result 
    of my own independent work/investigation, except where otherwise stated. Other 
    sources are acknowledged by explicit references.
    </p>

    <input type="submit" value="Submit">
</form>
</div>
</body>
</html>
