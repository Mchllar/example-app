<x-layout>
    <div class="mx-4">
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register Users
                </h2>
            </header>
            
            <form method="POST" action="{{ url('users.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" required />
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" required />
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="profile" class="inline-block text-lg mb-2">Profile Picture</label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="profile" accept="image/*" required />
                    @error('profile')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="role" class="inline-block text-lg mb-2">Role</label>
                    <select name="role" class="border border-gray-200 rounded p-2 w-full" id="roleSelect" required>
                        <option value="1">Student</option>
                        <option value="2">Supervisor</option>
                        <option value="3">SGS</option>
                        <option value="4">School Dean</option>
                        <option value="5">Registrar</option>
                        <option value="6">Board of Graduate Studies</option>
                        <option value="7">School Administrator</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="date_of_birth" class="inline-block text-lg mb-2">Date of Birth</label>
                    <input type="date" class="border border-gray-200 rounded p-2 w-full" name="date_of_birth"/>
                </div>

                <div class="mb-6">
                    <label for="gender" class="inline-block text-lg mb-2">Gender</label>
                    <select name="gender" class="border border-gray-200 rounded p-2 w-full">
                        @foreach($genders as $gender)
                            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="nationality" class="inline-block text-lg mb-2">Nationality</label>
                    <select name="nationality" class="border border-gray-200 rounded p-2 w-full">
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->nationality }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="religion" class="inline-block text-lg mb-2">Religion</label>
                    <select name="religion" class="border border-gray-200 rounded p-2 w-full">
                        @foreach($religions as $religion)
                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-6">
                    <label for="phone" class="inline-block text-lg mb-2">Phone Number</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="phone_number"/> <!-- Update name attribute -->
                    @error('phone_number') <!-- Update error key -->
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                

                <div id="studentFields" class="mb-6 hidden">
                    <!-- Student-specific fields -->
                    <div class="mb-6">
                        <label for="student_number" class="inline-block text-lg mb-2">Student Number</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="student_number"/>
                    </div>
                    <div class="mb-6">
                        <label for="year_of_admission" class="inline-block text-lg mb-2">Year of Admission</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="year_of_admission"/>
                    </div>
                    
                    <div class="mb-6">
                        <label for="year_of_registration" class="inline-block text-lg mb-2">Year of Registration</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="year_of_registration"/>
                    </div>
                    
                    <div class="mb-6">
                        <label for="year_of_graduation" class="inline-block text-lg mb-2">Year of Graduation</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="year_of_graduation"/>
                    </div>
                    <div class="mb-6">
                        <label for="academic_status" class="inline-block text-lg mb-2">Academic Status</label>
                        <select name="academic_status" class="border border-gray-200 rounded p-2 w-full">
                            <option value="Active">Active</option>
                            <option value="Academic Leave">Academic Leave</option>
                            <option value="Suspended">Suspended</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="programme" class="inline-block text-lg mb-2">Programme</label>
                        <select name="programme" class="border border-gray-200 rounded p-2 w-full">
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="supervisorFields" class="mb-6 hidden">
                    <!-- Supervisor-specific fields -->
                    <div class="mb-6">
                        <label for="school" class="inline-block text-lg mb-2">School</label>
                        <select name="school" class="border border-gray-200 rounded p-2 w-full">
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-6">
                        <label for="curriculum_vitae" class="inline-block text-lg mb-2">Curriculum Vitae</label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="curriculum_vitae"/>
                    </div>
                </div>
<!--
                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">Password</label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" required />
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password2" class="inline-block text-lg mb-2">Confirm Password</label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" required />
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-8">
                    <p>Already have an account? <a href="/login" class="text-blue-500 hover:text-blue-800">Login</a></p>
                </div>
            -->
            <div class="mb-6">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Sign Up
                </button>
            </div>
            </form>
        </x-card>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get references to select element and fields containers
            const roleSelect = document.getElementById("roleSelect");
            const studentFields = document.getElementById("studentFields");
            const supervisorFields = document.getElementById("supervisorFields");

            // Function to show or hide fields based on selected role
            function toggleFields() {
                const selectedRole = roleSelect.value;

                // Hide all fields first
                studentFields.classList.add("hidden");
                supervisorFields.classList.add("hidden");

                // Show fields based on selected role
                if (selectedRole === "1") {
                    studentFields.classList.remove("hidden");
                } else if (selectedRole === "2") {
                    supervisorFields.classList.remove("hidden");
                }
            }

            // Attach event listener to role select
            roleSelect.addEventListener("change", toggleFields);

            // Call toggleFields initially to set initial state
            toggleFields();
        });
    </script>
    
</x-layout>
