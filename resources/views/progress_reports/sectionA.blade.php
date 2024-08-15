<x-layout>
    <style>
        /* CSS to style table headings */
        th {
            font-weight: semibold;
            background-color: #e5e7eb; /* Grey background */
            border: 2px solid black; /* Visible borders */
        }

        /* CSS to change link color to red when hovered over */
        a:hover {
            color: red;
        }

        /* Custom CSS to style sections in green color */
        .section-heading {
            color: green;
        }

        .form-container {
            background-color: #f3f4f6; /* Grey background */
            padding: 20px; /* Add padding for better visual appearance */
        }
    </style>
    <!-- Step 1 Form -->
    <!-- This view will contain the form fields for step 1 -->
    <form method="POST" action="{{ route('progress_reports.storeSectionA') }}" class="form-container max-w-3xl mx-auto px-4 py-8">
        @csrf
        <div class="form-container max-w-3xl mx-auto px-4 py-8">
            <!-- SECTION A: GENERAL INFORMATION -->
            <div class="mb-8">
                <h2 class="text-lg font-semibold mb-4"><strong class="section-heading">SECTION A: GENERAL INFORMATION</strong></h2>
                <div class="grid grid-cols-2 gap-4">
                    
                    <div>
                        <label for="name"><strong>Student Name</strong></label>
                        <input type="text" id="name" name="name" class="border border-gray-200 rounded p-2 w-full" value="{{ old('name', auth()->user()->name) }}" readonly>
                        <!-- Hidden input field to capture student ID -->
                        <input type="hidden" name="student_id" value="{{ auth()->user()->student->id }}">
                    </div>
                    <div>
                        <label for="email"><strong>Email</strong></label>
                        <input type="email" id="email" name="email" class="border border-gray-200 rounded p-2 w-full" value="{{ old('email', auth()->user()->email) }}" readonly>
                    </div>
                    <div>
                        <label for="tel"><strong>Tel</strong></label>
                        <input type="text" id="tel" name="tel" class="border border-gray-200 rounded p-2 w-full" value="{{ old('tel', auth()->user()->phone_number) }}" readonly>
                    </div>
                    <div>
                        <label for="programme"><strong>Programme</strong></label>
                        <input type="text" id="programme" name="programme" class="border border-gray-200 rounded p-2 w-full" value="{{ old('programme', auth()->user()->student->program->name ?? '') }}" readonly>
                    </div>
                    <div>
                        <label for="school_institute"><strong>School/Institute</strong></label>
                        <input type="text" id="school_institute" name="school_institute" class="border border-gray-200 rounded p-2 w-full" value="{{ old('school_institute', auth()->user()->student->program->school->name ?? '') }}" readonly>
                    </div>
                    <div>
                        <label for="mode_of_study"><strong>Mode of Study</strong></label><br>
                        <select id="mode_of_study" name="mode_of_study" class="form-select border border-gray-200 rounded p-2">
                            <option value="full-time">Full-time</option>
                            <option value="part-time">Part-time</option>
                        </select>
                    </div>
                    <div>
                        <label for="principal_supervisor"><strong>Principal Supervisor</strong></label>
                        <input type="text" id="principal_supervisor" name="principal_supervisor" 
                               class="border border-gray-200 rounded p-2 w-full" 
                               value="{{ $principalSupervisors->first()->name ?? 'N/A' }}" readonly>
                        <!-- Hidden input field to capture principal supervisor ID -->
                        <input type="hidden" name="principal_supervisor_id" 
                               id="principal_supervisor_id" 
                               value="{{ $principalSupervisors->first()->id ?? '' }}">
                    </div>
                    
                    <div>
                        <label for="lead_supervisor"><strong>Lead Supervisor</strong></label>
                        <input type="text" id="lead_supervisor" name="lead_supervisor" 
                               class="border border-gray-200 rounded p-2 w-full" 
                               value="{{ $leadSupervisors->first()->name ?? 'N/A' }}" readonly>
                        <!-- Hidden input field to capture lead supervisor ID -->
                        <input type="hidden" name="lead_supervisor_id" 
                               id="lead_supervisor_id" 
                               value="{{ $leadSupervisors->first()->id ?? '' }}">
                    </div>
                    
                    <div>
                        <label class="block mb-2"><strong>Confirm your reporting period</strong></label>
                        <select id="reporting_period" name="reporting_period" class="border border-gray-200 rounded p-2 w-full">
                            <option value="">Select Reporting Period</option>
                            @foreach($periods as $period)
                                <option value="{{ $period->id }}">{{ $period->name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="reporting_periods_id" id="reporting_periods_id" value="">
                    </div>                               
                </div><br>
                <div class="mb-6">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#reporting_period').change(function() {
                $('#reporting_periods').val($(this).val());
            });
            $('#principal_supervisor').change(function() {
                $('#principal_supervisor_id').val($(this).val());
            });

            $('#lead_supervisor').change(function() {
                $('#lead_supervisor_id').val($(this).val());
            });
        });
    </script>
</x-layout>
