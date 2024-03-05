<x-layout>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thesis Correction Form</title>
    <style>
        /* Custom CSS for styling */
        .line {
            border-bottom: 1px solid #000;
            margin-bottom: 10px;
        }

        .quarter-width {
            width: 25%;
        }
    </style>
</head>
<body>
    <h1>Thesis Correction Form</h1>
    
    <form action="/thesis_correction_submit" method="post" enctype="multipart/form-data">
        @csrf

        <label for="candidate_name">Name of Candidate:</label><br>
        <input type="text" id="candidate_name" name="candidate_name" class="quarter-width"><br><br>
        
        <label for="student_number">Student Number:</label><br>
        <input type="text" id="student_number" name="student_number" class="quarter-width"><br><br>
        
        <label for="school">School/Institute:</label><br>
        <input type="text" id="school" name="school" class="quarter-width"><br><br>
        
        <label for="degree">Degree:</label><br>
        <input type="text" id="degree" name="degree" class="quarter-width"><br><br>
        
        <label for="thesis_title">Title of Thesis:</label><br>
        <input type="text" id="thesis_title" name="thesis_title" class="quarter-width"><br><br>

        <label>Summarise the types of corrections done in your thesis. (Attach a detailed report)</label><br><br>
        @for ($i = 1; $i <= 5; $i++)
            <div class="line"></div>
            <label for="correction{{$i}}">({{$i}})</label><br>
            <input type="text" id="correction{{$i}}" name="correction{{$i}}" class="quarter-width"><br><br>
        @endfor

        <button type="submit">Submit</button>
    </form>
</body>
</x-layout>
