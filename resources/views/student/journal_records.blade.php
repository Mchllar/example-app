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
            padding: 4px 8px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            width: 14%; 
            cursor: pointer;
            margin-top: 20px; 
            font-family: Arial, sans-serif;
            display: block; 
            text-align: center;

        }

        .btn:hover {
            background-color: #45a049;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
                  
        .document-link:hover {
            cursor: pointer;
            color: green; 
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
                        <td>
                        <span class="document-link" onclick="openDocument('{{ asset('journal_publications/' . $row->file_upload) }}')">View Publication</span>
                        </td>
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

    <script>
        function openDocument(pdfUrl) {
            window.open(pdfUrl, '_blank');
        }
    </script>