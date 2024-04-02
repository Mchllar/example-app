<x-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="max-w-md w-full">
            <div class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4 border border-gray-300">
                <h2 class="text-xl text-center mb-4">{{ __('Allocate Supervisor') }}</h2>
                <form method="POST" action="{{ route('allocation.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <select id="student_id" class="form-select border border-gray-300 @error('student_id') border-red-500 @enderror" name="student_id" required>
                            <option value="">-- Select Student --</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}" @if(old('student_id') == $student->id || $student->id == request()->input('student_id')) selected @endif>{{ optional($student->user)->name }}</option>
                            @endforeach
                        </select>
                    
                        @error('student_id')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

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

                    <div class="mb-4">
                        <label for="contract" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Contract') }}</label>
                        <input id="contract" type="file" class="form-input border border-gray-300 @error('contract') border-red-500 @enderror" name="contract" required>

                        @error('contract')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-4">
                        <label for="supervisor_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Supervisor') }}</label>
                        <select id="supervisor_id" class="form-select border border-gray-300 @error('supervisor_id') border-red-500 @enderror" name="supervisor_id" required>
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
