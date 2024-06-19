<x-layout>
<!--@include('partials._searchProgram')-->
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
            background-color: #f2f2f2;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .select-td {
            width: 50px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        #sendReminderBtn {
            background-color: #0000FF;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            width: 190px;
            margin-left: 10px;
            display: block;
        }

        #sendReminderBtn:hover {
            background-color: #4CAF50;
            color: white;
        }

        #sendReminderBtn:active {
            background-color: green;
        }

        .reminder {
            color: blue;
            font-style: italic;
        }

        #selectAllText:hover {
            color: green;
        }
        #selectAllText{
            color: blue; 
            cursor: pointer; 
            transition: color 0.3s ease;
        }
        #scheduleText {
            width: 80%;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }


        #scheduleText label {
            margin-right: 10px;
        }

        #scheduleText button {
            margin: 0 auto;
        }

        #scheduleText span {
            text-align: right;
        }


    </style>

<body>
    <div class="main-content">
        @if (isset($thesis) && !$thesis->isEmpty())
            <p>List of Pending Thesis/Dissertation Correction Submission</p></br></br>

            <div id="scheduleText">
            <span id="selectAllText" style="color: blue; cursor: pointer; transition: color 0.3s ease;" onclick="toggleSelectAll()">(Select All Students)</span>
    </div>
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th>Select</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($thesis as $item)
                    <tr>
                        <td>{{ $item->user->student->student_number }}</td>
                        <td>{{ $item->user->name }}</td>
                        <td class="select-td">
                            <input type="checkbox" class="user-checkbox" value="{{ $item->user->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="margin-top: 50px;">All students have submitted their corrections.</p>
        @endif
        <div id="scheduleText">
                <!--<label for="scheduledDateTime">Schedule Date and Time (optional):</label>
                <input type="datetime-local" id="scheduledDateTime" name="scheduledDateTime">
         -->
                <button id="sendReminderBtn">Send Reminder</button>
            </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var allSelected = false;

        function toggleSelectAll() {
            var selectAllText = document.getElementById('selectAllText');
            var checkboxes = document.getElementsByClassName('user-checkbox');

            if (allSelected) {
                // Unselect all checkboxes
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = false;
                }
                // Update text to "Select All Students" and color to blue
                selectAllText.textContent = "(Select All Students)";
                selectAllText.style.color = "blue";
                allSelected = false;
            } else {
                // Select all checkboxes
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = true;
                }
                // Update text to "Unselect All Students" and color to red
                selectAllText.textContent = "(Unselect All Students)";
                selectAllText.style.color = "red";
                allSelected = true;
            }
        }

        $(document).ready(function() {
            $('#scheduledDateTime').on('input', function() {
                var scheduledDateTime = $(this).val();
                if (scheduledDateTime) {
                    $('#sendReminderBtn').text('Schedule Reminder');
                } else {
                    $('#sendReminderBtn').text('Send Reminder');
                }
            });

            $('#sendReminderBtn').click(function() {
                var userIds = [];
                $('.user-checkbox:checked').each(function() {
                    userIds.push($(this).val());
                });

                if (userIds.length === 0) {
                    alert('Please select at least one student.');
                    return;
                }

                var scheduledDateTime = $('#scheduledDateTime').val();

                $.ajax({
                    url: '{{ route("studentReminder") }}',
                    method: 'POST',
                    data: {
                        user_ids: userIds,
                        scheduled_date_time: scheduledDateTime,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(xhr) {
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</x-layout>
