<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        p {
            text-align: center;
            font-size: 25px;
            line-height: 1.5;
        }

        .main-content {
            flex: 3;
            padding: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        th {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .btn {
            padding: 4px 8px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            width: 10%; 
            cursor: pointer;
            margin-top: 20px;
            margin-left: 10px; 
            font-family: Arial, sans-serif;
            display: block; 
            text-align: center;
        }

        .btn:hover {
            background-color: green; 
        }

        .file-info {
            display: flex; 
            align-items: center; 
            flex-direction: column; 
        }

        .edit-file-button {
            background-color: #007bff;
            color: white;
            padding: 4px 8px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px; 
            font-family: Arial, sans-serif;
            display: block; 
        }

        .edit-file-button:hover {
            background-color: #dc3545; 
        }

        .center-cell {
            text-align: center;
        }

        .button-container {
            float: right;
            margin-left: 10px; 
        }

        .approve-button {
            background-color: #0000FF; 
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .approve-button:hover {
            background-color: #4CAF50; 
        }

        .clearance-row {
            display: none;
        }  
        
        #sendReminderBtn {
            background-color: #4CAF50;
            border: 1px solid black;
            color: black;
            padding: 2px 10px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s, color 0.3s;
            width: 100%; 
        }

        #sendReminderBtn:hover {
            background-color: red;
            color: white;
        }

        #sendReminderBtn:active {
            background-color: green;
        }

        .confirmation {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
        }

        .document-link:hover {
            cursor: pointer;
            color: green; 
        }

        #pdfContainer {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        #pdfContainer button {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 8px 8px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;           
        }

        #pdfContainer iframe {
            width: 80%;
            height: 80%;
            border: none;
        }
        button[type="button"] {
            display: block;
            margin: 20px auto; 
            padding: 6px 15px;
            background-color: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }

        button[type="button"]:hover {
            background-color: green; 
        }

        input[type="submit"] {
            width: 100%;
            padding: 5px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .custom-file-upload {
            display: inline-block;
            padding: 5px 5px;
            cursor: pointer;
            background-color: #0000FF;
            color: #fff;
            border: none;
            border-radius: 5px;
        }

        input[type="file"] {
            display: none;
        }
        .upload-button {
            background-color: #0000FF; 
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .upload-button:hover {
            background-color: #4CAF50; 
        }
        .document-link {
            cursor: pointer; 
        }

        .document-link.available {
            color: blue; 
            text-decoration: underline; 
        }
        .custom-button-text {
            color: blue; 
            margin-left: 10%; 
            text-decoration: underline; 
        }
        
    </style>
</head>
<body>
    <div id="pdfContainer">
        <button onclick="closeDocument()">Close</button>
        <iframe id="pdfViewer" frameborder="0"></iframe>
    </div>

    <x-layout>
    <div class="main-content">
        @if (isset($defense) && !$defense->isEmpty())
            <p>List of Defense Records</p>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th>Defense Decision</th>
                        <th>Comments</th>
                        <th>Defense Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($defense as $defense)
                        <tr>
                            <td>{{ $defense->student->student_number }}</td>
                            <td>{{ $defense->student->user->name }}</td>
                            <td>{{ $defense->defense_decision }}</td>
                            <td>{{ $defense->comments }}</td>
                            <td>{{ $defense->defense_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="margin-top: 50px;">Currently, No Defense records have been submitted.</p>
        @endif
    </div>
    </x-layout>
</body>
</html>
