<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .main-content {
            flex: 3;
            padding: 20px;
        }

        form {
            width: 100%;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }

        input[type="date"],
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 20%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h5 {
            color: red; 
        }

    </style>
</head>
<body>
    <x-layout>
        <div class="container">
            <div class="main-content">
                <form action="{{ route('journal.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <th>Journal Title</th>
                            <th>Title of Paper</th>
                            <th>Status of Paper</th>
                        </tr>
                        <tr>
                            
                            <td><input type="text" name="journal_title" id="journal_title"  ></td>
                            <td><input type="text" name="title_of_paper" id="title_of_paper" ></td>
                            <td>
                                <select name="status" id="status" >
                                    <option value="under review">Under Review</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="published">Published</option>
                                </select>
                            </td>
                        </tr>

                    </table>
                    <br>
                    <h3> Upload the actual paper or the acceptance. </h3><br>
                    <h5>(Upload PDF documents ONLY.)</h5>
                    <input type="file" name="file_upload"> <br><br>
                    <input type="submit" value="Submit">
                </form>   
            </div> 
        </div>
    </x-layout>
</body>

