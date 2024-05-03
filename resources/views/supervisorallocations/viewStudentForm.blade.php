<x-layout>
    <style>
        /* Custom CSS to style sections in green color */
        .section-heading {
            color: green;
        }

        /* Custom CSS for form container */
        .form-container {
            background-color: #333333; /* Grey background */
            padding: 20px; /* Add padding for better visual appearance */
        }

        /* Center the form vertically */
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh; /* Make the container at least as tall as the viewport */
        }
    </style>

    <div class="centered">
        <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-2 text-center">Student Request - {{ $student->user->name }}</h1>

            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-2">
                <p><strong>Thesis Title:</strong> {{ $form->thesis_title }}</p>
                <p><strong>Proposed Supervisor 1:</strong> {{ $form->proposed_supervisor_1 }}</p>
                <p><strong>Proposed Supervisor 2:</strong> {{ $form->proposed_supervisor_2 }}</p>
                <p><strong>Proposed Supervisor 3:</strong> {{ $form->proposed_supervisor_3 }}</p>
                <p><strong>Effective Date:</strong> {{ $form->effective_date }}</p>
                <p><strong>Reason for Change:</strong> {{ $form->reason_for_change }}</p>
            </div>
        </div>
    </div>
    @php
        $userRole = auth()->user()->role->name ?? null;
     @endphp
     @if($userRole === 'School Dean')
    <p class="text-center"><strong>Approve Request</strong></p>
    <div class="centered">
        <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
            <form action="{{ route('storeSchoolApproval') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                    <input type="hidden" id="student_id" name="student_id" value="{{ $student->id }}">               
                <div class="mb-2">
                    <label for="status">Status:</label>
                    <select id="status" name="status" class="form-select border border-gray-200 rounded p-2" required>
                        <option value="approved">Approved</option>
                        <option value="denied">Denied</option>
                    </select>
                </div>
                <div class="flex items-center justify-center mt-8">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @elseif($userRole === 'Board of Graduate Studies')
    <p class="text-center"><strong>Approve Request</strong></p>
    <div class="centered">
        <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
            <form action="{{ route('storeBoardApproval') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                    <input type="hidden" id="student_id" name="student_id" value="{{ $student->id }}">            
                <div class="mb-2">
                    <label for="status">Status:</label>
                    <select id="status" name="status" class="form-select border border-gray-200 rounded p-2" required>
                        <option value="approved">Approved</option>
                        <option value="denied">Denied</option>
                    </select>
                </div>
                <div class="flex items-center justify-center mt-8">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @elseif($userRole === 'staff')
    <p class="text-center"><strong>Approve Request</strong></p>
    <div class="centered">
        <div class="form-container max-w-lg mx-auto px-4 py-8 rounded-lg shadow-md">
            <form action="{{ route('storeDirectorApproval') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                    <input type="hidden" id="student_id" name="student_id" value="{{ $student->id }}">               
                <div class="mb-2">
                    <label for="status">Status:</label>
                    <select id="status" name="status" class="form-select border border-gray-200 rounded p-2" required>
                        <option value="approved">Approved</option>
                        <option value="denied">Denied</option>
                    </select>
                </div>
                <div class="flex items-center justify-center mt-8">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @endif
</x-layout>
