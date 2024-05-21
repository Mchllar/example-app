<!DOCTYPE html>
<html>
<head>
    <title>Thesis Submission</title>
    <style>
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .alert-success {
            background-color: green;
            color: white;
            border-color: #2f855a;
        }
        .alert-danger {
            background-color: red;
            color: white;
            border-color: #c53030;
        }
    </style>
</head>
<body>
    @if(session()->has('message'))
        <div id="successMessage" class="alert alert-success">
            <p>{{ session('message') }}</p>
        </div>
    @endif

    @if(session()->has('failmessage'))
        <div id="failmessage" class="alert alert-danger">
            <p>{{ session('failmessage') }}</p>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function() {
                var successMessage = document.getElementById('successMessage');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }

                var failMessage = document.getElementById('failmessage');
                if (failMessage) {
                    failMessage.style.display = 'none';
                }
            }, 10000); // 10 seconds
        });
    </script>
</body>
</html>
