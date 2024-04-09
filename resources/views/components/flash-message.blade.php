@if(session()->has('message'))
    <div id="successMessage" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-green-500 text-white border border-green-700 rounded p-4 shadow-md">
        <p style="font-family: Arial, sans-serif;">{{ session('message') }}</p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            setTimeout(function(){
                document.getElementById('successMessage').style.display = 'none';
            }, 2000);
        });
    </script>
@endif
