<x-layout>
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

          /* Sidebar navigation */
        .sidebar {
            flex: 1;
            background-color: #f0f0f0;
            padding: 20px;
            border-right: 1px solid #ccc;
            display: none; /* Initially hide the sidebar */
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            text-decoration: none;
            color: #333;
            display: block;
            transition: color 0.3s ease;
        }

        .sidebar a:hover {
            color: #555;
        }

        .active {
            color: #007bff; /* Active link color */
        }

        /* Main content */
        .main-content {
            flex: 3;
            padding: 20px;
        }

        /* Form styles */
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
            width: 30%;
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
        p {
            text-align: justify;
            font-size: 16px;
            line-height: 1.5;
        }
    </style>

    <div class="container">
        <!-- Sidebar navigation -->
        <div class="sidebar">
            <ul>
                <li><a href="/" class="font-bold">Home</a></li>
                <li><a href="{{ route('changeSupervisor') }}" class="font-bold">Request Change of Supervisor</a></li>
                <li><a href="{{ route('progress_reports.index')}}" class="font-bold">Submit Progress Report</a></li>
                <li><a href="{{ route('journal.index')}}" class="font-bold">Journal Publications</a></li>
                <li><a href="{{ route('conference.index')}}" class="font-bold">Conference Publications</a></li>
                <li><a href="{{ route('thesis.index')}}"class="font-bold">Thesis/Dissertation</a></li>
                <li><a href="#" class="font-bold">Request for Academic Leave</a></li>
                <li><a href="{{ route('conference.review')}}" class="font-bold">Request for Conference Approval</a></li>
                <li><a href="{{ route('notice.submission')}}" class="font-bold">Submit Notice Of Intent</a></li>
            
            </ul>
        </div>
        <!-- Main content -->
        <div class="main-content">
        <p><i>PUBLICATIONS/CONFERENCE PAPERS: (Please note the status of the following. Please note that without having a total of 3 papers as clarified in the PhD regulations, you are not eligible to graduate)</i></p>

            <form action="{{ route('conference.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                        <th>Conference Title & Website</th>
                        <th>Title of Paper Presentation</th>
                        <th>Status of Paper</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="conference_title" id="conference_title"></td>
                        <td><input type="text" name="title_of_paper" id="title_of_paper"></td>
                        <td>
                            <select name="status" id="status">
                                <option value="under review">Under Review</option>
                                <option value="accepted">Accepted</option>
                                <option value="published">Published</option>
                            </select>
                        </td>
                    </tr>
                </table>
                </br>
                <h3> Upload the actual paper or the acceptance. </h3></br>
                <input type="file" name="file_upload"> </br></br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</x-layout>
