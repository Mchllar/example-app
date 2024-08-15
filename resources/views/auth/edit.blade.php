<x-layout>
    <div class="mx-4">
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Edit User
                </h2>
            </header>
            
            <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" value="{{ old('name', $user->name) }}" required />
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ old('email', $user->email) }}" required />
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="profile" class="inline-block text-lg mb-2">Profile Picture</label>
                    
                    @if($user->profile)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $user->profile) }}" alt="Profile Picture" class="w-32 h-32 object-cover rounded">
                        </div>
                    @endif
                
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="profile" accept="image/*" />
                    
                    @error('profile')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                

                <div class="mb-6">
                    <label for="role" class="inline-block text-lg mb-2">Role</label>
                    <select name="role_id" class="border border-gray-200 rounded p-2 w-full" id="roleSelect" required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="studentFields" class="mb-6 {{ $user->role_id != 1 ? 'hidden' : '' }}">
                    <!-- Student-specific fields -->
                    <div class="mb-6">
                        <label for="student_number" class="inline-block text-lg mb-2">Student Number</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="student_number" value="{{ old('student_number', optional($user->student)->student_number) }}" />
                    </div>
                    <div class="mb-6">
                        <label for="programme" class="inline-block text-lg mb-2">Programme</label>
                        <select name="programme" class="border border-gray-200 rounded p-2 w-full">
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}" {{ optional($user->student)->program_id == $program->id ? 'selected' : '' }}>{{ $program->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div id="supervisorFields" class="mb-6 {{ $user->role_id != 2 ? 'hidden' : '' }}">
                    <!-- Supervisor-specific fields -->
                    <div class="mb-6">
                        <label for="school" class="inline-block text-lg mb-2">School</label>
                        <select name="school" class="border border-gray-200 rounded p-2 w-full">
                            @foreach($schools as $school)
                                <option value="{{ $school->id }}" {{ optional($user->supervisor)->school_id == $school->id ? 'selected' : '' }}>{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="mb-6">
                        <label for="curriculum_vitae" class="inline-block text-lg mb-2">Curriculum Vitae</label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="curriculum_vitae" />
                    </div>
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Update User
                    </button>
                </div>
            </form>
        </x-card>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const roleSelect = document.getElementById("roleSelect");
            const studentFields = document.getElementById("studentFields");
            const supervisorFields = document.getElementById("supervisorFields");

            function toggleFields() {
                const selectedRole = roleSelect.value;

                studentFields.classList.add("hidden");
                supervisorFields.classList.add("hidden");

                if (selectedRole === "1") {
                    studentFields.classList.remove("hidden");
                } else if (selectedRole === "2") {
                    supervisorFields.classList.remove("hidden");
                }
            }

            roleSelect.addEventListener("change", toggleFields);
            toggleFields();
        });
    </script>
</x-layout>
