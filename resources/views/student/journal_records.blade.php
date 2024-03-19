<x-layout>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        p {
            text-align: justify;
            font-size: 16px;
            line-height: 1.5;
        }
        .main-content {
            flex: 3;
            padding: 20px;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
        .btn {
            width: 30%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #45a049;
        }

    </style>
    <div class="main-content">   
    <p><i>PUBLICATIONS/CONFERENCE PAPERS: (Please note the status of the following. Please note that without having a total of 3 papers as clarified in the PhD regulations, you are not eligible to graduate)</i></p>
    </br>

    
    @if (isset($journals) && !$journals->isEmpty())
        <p>List of your Journal Articles: </p>
        <table>
            <thead>
                <tr>
                    <th>Journal Title</th>
                    <th>Title of Paper</th>
                    <th>Status</th>
                    <th>File</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($journals as $row)
                    <tr>
                        <td>{{ $row['journal_title'] }}</td>
                        <td>{{ $row['title_of_paper'] }}</td>
                        <td>{{ $row['status'] }}</td>
                        <td>{{ $row['file_upload'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p> You currently have no Journal Articles</p>
    @endif
    <a href="{{ route('journalSubmission') }}" class="btn btn-primary">Submit Journal Article</a>
    </div>
</x-layout>