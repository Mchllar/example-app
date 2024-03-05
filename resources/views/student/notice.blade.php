
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        input[type="date"], input[type="text"], select {
            width: 100%;
            padding: 6px 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>

        <h3>Section A:</h3>

<table>
    <tr>
        <th>Student Name</th>
        <td><input type="text" name="student_name"></td>
        <th>Student Number</th>
        <td><input type="text" name="student_number"></td>
    </tr>
    <tr>
        <th>Faculty/School/Institute</th>
        <td><input type="text" name="faculty"></td>
        <th>Title of Degree</th>
        <td><input type="text" name="degree_title"></td>
    </tr>
    <tr>
        <th>Title of Thesis</th>
        <td><input type="text" name="thesis_title"></td>
        <th>Email Address</th>
        <td><input type="email" name="email"></td>
    </tr>
    <tr>
        <th>Phone no.</th>
        <td><input type="tel" name="phone"></td>
        <th>Date intended to submit thesis</th>
        <td><input type="date" name="intended_submit_date"></td>
    </tr>
</table>

    <i>PUBLICATIONS/CONFERENCE PAPERS: (Please the status of the following. Please note that without </br>having a total of 3 papers as clarified in the PhD regulations, you are not eligible to graduate)</i>

    <h4>Journal</h4>

    <table>
        <tr>
            <th>Date</th>
            <th>Journal</br>(Only journals that meet the approved criteria are acceptable)</th>
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

        <h4>Conference</h4>

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

