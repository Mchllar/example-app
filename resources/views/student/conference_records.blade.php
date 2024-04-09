<!DOCTYPE html>
<html lang="en">
    <head>
        <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                }
                .main-content {
                    flex: 3;
                    padding: 20px;
                }

                p {
                    text-align: justify;
                    font-size: 16px;
                    line-height: 1.5;
                }

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

            </style>
        </head>
        <body>
        <div id="pdfContainer">
            <button onclick="closeDocument()">Close</button>
            <iframe id="pdfViewer" frameborder="0"></iframe>
        </div>

        <x-layout>
            <div class="main-content">  
            <p><i>PUBLICATIONS/CONFERENCE PAPERS: (Please note the status of the following. Please note that without having a total of 3 papers as clarified in the PhD regulations, you are not eligible to graduate)</i></p>
            <br>

            @if (isset($conferences) && !$conferences->isEmpty())
            <p>List of your Conference Articles:</p>
                <table>
                    <thead> 
                        <tr>          
                            <th>Conference Title & Website</th>
                            <th>Title of Paper Presentation</th>
                            <th>Status of Paper</th>
                            <th>File</th>  
                            <th>Submission Date</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conferences as $row)
                            <tr>
                                <td>{{ $row['conference_title'] }}</td>
                                <td>{{ $row['title_of_paper'] }}</td>
                                <td>{{ $row['status'] }}</td>
                                <td>
                                <span class="document-link" onclick="openDocument('{{ asset('conference_publications/' . $row->file_upload) }}')">View Publication</span>
                                </td>
                                <td>{{ $row['created_at'] }}</td> 
                            </tr>
                        @endforeach  
                    </tbody>
                </table>
            @else
                <p> You currently have no Conference Articles</p>   
            @endif
            <a href="{{ route('conferenceSubmission') }}" class="btn btn-primary">Submit Conference Paper</a>
            </div>
        </x-layout>

        <script>
            function openDocument(pdfUrl) {
                // Display the PDF container
                document.getElementById('pdfContainer').style.display = 'flex'; 
                
                // Set the source of the iframe to the PDF URL
                document.getElementById('pdfViewer').src = pdfUrl;
            }

            function closeDocument() {
                // Hide the PDF container
                document.getElementById('pdfContainer').style.display = 'none';
                
                // Clear the source of the iframe
                document.getElementById('pdfViewer').src = '';
            }

        </script>
    </body>
</html>
