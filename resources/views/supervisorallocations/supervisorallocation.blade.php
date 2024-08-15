<x-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="max-w-md w-full">
            <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 border border-gray-300">
                <h2 class="text-xl text-center mb-4">{{ __('Allocate Supervisor') }}</h2>
                <form method="POST" action="{{ route('allocation.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="student_id" class="block text-gray-700 text-sm font-bold mb-2">Student</label>
                        @foreach($students as $student)
                            @if(old('student_id') == $student->id || $student->id == request()->input('student_id'))
                                <label>{{ optional($student->user)->name }}</label>
                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                            @endif
                        @endforeach
                        @error('student_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!--<div class="mb-4">
                        <input type="hidden" name="student_name" value="{{ optional($student->user)->name }}">
                        <p>{{ optional($student->user)->name }}</p>
                    </div>-->

                    <div class="mb-4">
                        <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Start Date') }}</label>
                        <input id="start_date" type="date" class="form-input border border-gray-300 @error('start_date') border-red-500 @enderror" name="start_date" value="{{ old('start_date') }}" required>

                        @error('start_date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">{{ __('End Date') }}</label>
                        <input id="end_date" type="date" class="form-input border border-gray-300 @error('end_date') border-red-500 @enderror" name="end_date" value="{{ old('end_date') }}" required>

                        @error('end_date')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="notes" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Notes') }}</label>
                        <textarea id="notes" class="form-textarea border border-gray-300 @error('notes') border-red-500 @enderror" name="notes" required>{{ old('notes') }}</textarea>

                        @error('notes')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Status') }}</label>
                        <select id="status" name="status" class="form-select border border-gray-300 @error('status') border-red-500 @enderror" required>
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    
                        @error('status')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Supervisor Type Dropdown -->
                    <div class="mb-4">
                        <label for="supervisor_type" class="block text-gray-700 text-sm font-bold mb-2">Supervisor Type</label>
                        <div class="relative">
                            <select name="supervisor_type" id="supervisor_type" class="block appearance-none w-48 bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                <option value="principal">{{ __('Principal') }}</option>
                                <option value="lead">{{ __('Lead') }}</option>
                                <option value="supervisor">{{ __('Supervisor') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="contract" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Contract (.pdf files)') }}</label>
                        <input id="contract" type="file" class="form-input border border-gray-300 @error('contract') border-red-500 @enderror" name="contract" required>

                        @error('contract')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="supervisor_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Supervisor') }}</label>
                        <select id="supervisor_id" class="form-select border border-gray-300 @error('supervisor_id') border-red-500 @enderror" name="supervisor_id" required size="5">
                            <option value="">-- Select Supervisor --</option>
                            @foreach($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                            @endforeach
                        </select>

                        @error('supervisor_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            {{ __('Allocate Supervisor') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
