<x-layout>
    <div class="mx-4">
        <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
            <header class="text-center">
                <h2 class="text-2xl font-bold uppercase mb-1">
                    Register
                </h2>
            </header>

            <form method="POST" action="/users" id="registerForm" enctype="multipart/form-data" onsubmit="return validateForm()">
                @csrf
                <div class="mb-6">
                    <label for="name" class="inline-block text-lg mb-2">Name</label>
                    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name" required />
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="email" class="inline-block text-lg mb-2">Email</label>
                    <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" required />
                    @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="profile" class="inline-block text-lg mb-2">Profile Picture</label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="profile" accept="image/*" />
                    @error('profile')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="role" class="inline-block text-lg mb-2">Role</label>
                    <select name="role" class="border border-gray-200 rounded p-2 w-full" id="roleSelect" required>
                        <option value="student">Student</option>
                        <option value="supervisor">Supervisor</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>

                    <div id="studentFields" class="mb-6 hidden">
                        <div class="mb-6">
                        <label for="student_number" class="inline-block text-lg mb-2">Student Number</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="student_number"/>
                        </div>
                        <div class="mb-6">
                        <label for="phone_number" class="inline-block text-lg mb-2">Phone Number</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="phone_number"/>
                        </div>
                        <div class="mb-6">
                        <label for="date_of_birth" class="inline-block text-lg mb-2">Date of Birth</label>
                        <input type="date" class="border border-gray-200 rounded p-2 w-full" name="date_of_birth"/>
                        </div>
                        <div class="mb-6">
                        <label for="gender" class="inline-block text-lg mb-2">Gender</label>
                        <select name="gender" class="border border-gray-200 rounded p-2 w-full">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                        </select>
                        </div>
                        <div class="mb-6">
                        <label for="nationality" class="inline-block text-lg mb-2">Nationality</label>
        <select name="nationality" class="border border-gray-200 rounded p-2 w-full">
            <option value="afghan">Afghan</option>
            <option value="albanian">Albanian</option>
            <option value="algerian">Algerian</option>
            <option value="american">American</option>
            <option value="andorran">Andorran</option>
            <option value="angolan">Angolan</option>
            <option value="antiguans">Antiguans</option>
            <option value="argentinean">Argentinean</option>
            <option value="armenian">Armenian</option>
            <option value="australian">Australian</option>
            <option value="austrian">Austrian</option>
            <option value="azerbaijani">Azerbaijani</option>
            <option value="bahamian">Bahamian</option>
            <option value="bahraini">Bahraini</option>
            <option value="bangladeshi">Bangladeshi</option>
            <option value="barbadian">Barbadian</option>
            <option value="belarusian">Belarusian</option>
            <option value="belgian">Belgian</option>
            <option value="belizean">Belizean</option>
            <option value="beninese">Beninese</option>
            <option value="bhutanese">Bhutanese</option>
            <option value="bolivian">Bolivian</option>
            <option value="bosnian">Bosnian</option>
            <option value="brazilian">Brazilian</option>
            <option value="british">British</option>
            <option value="bruneian">Bruneian</option>
            <option value="bulgarian">Bulgarian</option>
            <option value="burkinabe">Burkinabe</option>
            <option value="burmese">Burmese</option>
            <option value="burundian">Burundian</option>
            <option value="cambodian">Cambodian</option>
            <option value="cameroonian">Cameroonian</option>
            <option value="canadian">Canadian</option>
            <option value="cape verdean">Cape Verdean</option>
            <option value="central african">Central African</option>
            <option value="chadian">Chadian</option>
            <option value="chilean">Chilean</option>
            <option value="chinese">Chinese</option>
            <option value="colombian">Colombian</option>
            <option value="comoran">Comoran</option>
            <option value="congolese">Congolese</option>
            <option value="costa rican">Costa Rican</option>
            <option value="croatian">Croatian</option>
            <option value="cuban">Cuban</option>
            <option value="cypriot">Cypriot</option>
            <option value="czech">Czech</option>
            <option value="danish">Danish</option>
            <option value="djibouti">Djibouti</option>
            <option value="dominican">Dominican</option>
            <option value="dutch">Dutch</option>
            <option value="east timorese">East Timorese</option>
            <option value="ecuadorean">Ecuadorean</option>
            <option value="egyptian">Egyptian</option>
            <option value="emirian">Emirian</option>
            <option value="equatorial guinean">Equatorial Guinean</option>
            <option value="eritrean">Eritrean</option>
            <option value="estonian">Estonian</option>
            <option value="ethiopian">Ethiopian</option>
            <option value="fijian">Fijian</option>
            <option value="filipino">Filipino</option>
            <option value="finnish">Finnish</option>
            <option value="french">French</option>
            <option value="gabonese">Gabonese</option>
            <option value="gambian">Gambian</option>
            <option value="georgian">Georgian</option>
            <option value="german">German</option>
            <option value="ghanaian">Ghanaian</option>
            <option value="greek">Greek</option>
            <option value="grenadian">Grenadian</option>
            <option value="guatemalan">Guatemalan</option>
            <option value="guinea-bissauan">Guinea-Bissauan</option>
            <option value="guinean">Guinean</option>
            <option value="guyanese">Guyanese</option>
            <option value="haitian">Haitian</option>
            <option value="herzegovinian">Herzegovinian</option>
            <option value="honduran">Honduran</option>
            <option value="hungarian">Hungarian</option>
            <option value="icelander">Icelander</option>
            <option value="indian">Indian</option>
            <option value="indonesian">Indonesian</option>
            <option value="iranian">Iranian</option>
            <option value="iraqi">Iraqi</option>
            <option value="irish">Irish</option>
            <option value="israeli">Israeli</option>
            <option value="italian">Italian</option>
            <option value="ivorian">Ivorian</option>
            <option value="jamaican">Jamaican</option>
            <option value="japanese">Japanese</option>
            <option value="jordanian">Jordanian</option>
            <option value="kazakhstani">Kazakhstani</option>
            <option value="kenyan">Kenyan</option>
            <option value="kittian and nevisian">Kittian and Nevisian</option>
            <option value="kuwaiti">Kuwaiti</option>
            <option value="kyrgyz">Kyrgyz</option>
            <option value="laotian">Laotian</option>
            <option value="latvian">Latvian</option>
            <option value="lebanese">Lebanese</option>
            <option value="liberian">Liberian</option>
            <option value="libyan">Libyan</option>
            <option value="liechtensteiner">Liechtensteiner</option>
            <option value="lithuanian">Lithuanian</option>
            <option value="luxembourger">Luxembourger</option>
            <option value="macedonian">Macedonian</option>
            <option value="malagasy">Malagasy</option>
            <option value="malawian">Malawian</option>
            <option value="malaysian">Malaysian</option>
            <option value="maldivan">Maldivan</option>
            <option value="malian">Malian</option>
            <option value="maltese">Maltese</option>
            <option value="marshallese">Marshallese</option>
            <option value="mauritanian">Mauritanian</option>
            <option value="mauritian">Mauritian</option>
            <option value="mexican">Mexican</option>
            <option value="micronesian">Micronesian</option>
            <option value="moldovan">Moldovan</option>
            <option value="monacan">Monacan</option>
            <option value="mongolian">Mongolian</option>
            <option value="moroccan">Moroccan</option>
            <option value="mosotho">Mosotho</option>
            <option value="motswana">Motswana</option>
            <option value="mozambican">Mozambican</option>
            <option value="namibian">Namibian</option>
            <option value="nauruan">Nauruan</option>
            <option value="nepalese">Nepalese</option>
            <option value="new zealander">New Zealander</option>
            <option value="ni-vanuatu">Ni-Vanuatu</option>
            <option value="nicaraguan">Nicaraguan</option>
            <option value="nigerien">Nigerien</option>
            <option value="north korean">North Korean</option>
            <option value="northern irish">Northern Irish</option>
            <option value="norwegian">Norwegian</option>
            <option value="omani">Omani</option>
            <option value="pakistani">Pakistani</option>
            <option value="palauan">Palauan</option>
            <option value="panamanian">Panamanian</option>
            <option value="papua new guinean">Papua New Guinean</option>
            <option value="paraguayan">Paraguayan</option>
            <option value="peruvian">Peruvian</option>
            <option value="polish">Polish</option>
            <option value="portuguese">Portuguese</option>
            <option value="qatari">Qatari</option>
            <option value="romanian">Romanian</option>
            <option value="russian">Russian</option>
            <option value="rwandan">Rwandan</option>
            <option value="saint lucian">Saint Lucian</option>
            <option value="salvadoran">Salvadoran</option>
            <option value="samoan">Samoan</option>
            <option value="san marinese">San Marinese</option>
            <option value="sao tomean">Sao Tomean</option>
            <option value="saudi">Saudi</option>
            <option value="scottish">Scottish</option>
            <option value="senegalese">Senegalese</option>
            <option value="serbian">Serbian</option>
            <option value="seychellois">Seychellois</option>
            <option value="sierra leonean">Sierra Leonean</option>
            <option value="singaporean">Singaporean</option>
            <option value="slovakian">Slovakian</option>
            <option value="slovenian">Slovenian</option>
            <option value="solomon islander">Solomon Islander</option>
            <option value="somali">Somali</option>
            <option value="south african">South African</option>
            <option value="south korean">South Korean</option>
            <option value="spanish">Spanish</option>
            <option value="sri lankan">Sri Lankan</option>
            <option value="sudanese">Sudanese</option>
            <option value="surinamer">Surinamer</option>
            <option value="swazi">Swazi</option>
            <option value="swedish">Swedish</option>
            <option value="swiss">Swiss</option>
            <option value="syrian">Syrian</option>
            <option value="taiwanese">Taiwanese</option>
            <option value="tajik">Tajik</option>
            <option value="tanzanian">Tanzanian</option>
            <option value="thai">Thai</option>
            <option value="togolese">Togolese</option>
            <option value="tongan">Tongan</option>
            <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
            <option value="tunisian">Tunisian</option>
            <option value="turkish">Turkish</option>
            <option value="tuvaluan">Tuvaluan</option>
            <option value="ugandan">Ugandan</option>
            <option value="ukrainian">Ukrainian</option>
            <option value="uruguayan">Uruguayan</option>
            <option value="uzbekistani">Uzbekistani</option>
            <option value="venezuelan">Venezuelan</option>
            <option value="vietnamese">Vietnamese</option>
            <option value="welsh">Welsh</option>
            <option value="yemenite">Yemenite</option>
            <option value="zambian">Zambian</option>
            <option value="zimbabwean">Zimbabwean</option>
        </select>
                        </div>
                        <div class="mb-6">
        <label for="religion" class="inline-block text-lg mb-2">Religion</label>
        <select name="religion" class="border border-gray-200 rounded p-2 w-full">
            <option value="Judaism">Judaism</option>
            <option value="Christianity">Christianity</option>
            <option value="Islam">Islam</option>
            <option value="Hinduism">Hinduism</option>
            <option value="Other">Other</option>
        </select>
                        </div>
                        <div class="mb-6">
                        <label for="school" class="inline-block text-lg mb-2">School</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="school"/>
                        </div>
                        <div class="mb-6">
                        <label for="programme" class="inline-block text-lg mb-2">Programme</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="programme"/>
                        </div>
                        <div class="mb-6">
                        <label for="intake" class="inline-block text-lg mb-2">Intake</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="intake"/>
                        </div>
                        <div class="mb-6">
                        <label for="previous_school" class="inline-block text-lg mb-2">Previous School</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="previous_school"/>
                        </div>
                        <div class="mb-6">
                        <label for="status" class="inline-block text-lg mb-2">Status</label>
                        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="status"/>
                        </div>
                    </div>

                <div id="supervisorFields" class="mb-6 hidden">
                    <div class="mb-6">
                    <label for="curriculum_vitae" class="inline-block text-lg mb-2">Curriculum Vitae</label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="curriculum_vitae"/>
                    </div>
                    <div class="mb-6">
                    <label for="contract" class="inline-block text-lg mb-2">Contract</label>
                    <input type="file" class="border border-gray-200 rounded p-2 w-full" name="contract"/>
                    </div>
                    
                </div>


                <div class="mb-6">
                    <label for="password" class="inline-block text-lg mb-2">Password</label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" required />
                    @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password2" class="inline-block text-lg mb-2">Confirm Password</label>
                    <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" required />
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                        Sign Up
                    </button>
                </div>

                <div class="mt-8">
                    <p>Already have an account? <a href="/login" class="text-laravel">Login</a></p>
                </div>
            </form>
        </x-card>
    </div>

    <script>
        // Add event listener to role select dropdown
        document.getElementById('roleSelect').addEventListener('change', function () {
            // Get selected role value
            var role = this.value;
            // Hide all role-specific fields
            document.querySelectorAll('[id$="Fields"]').forEach(function (element) {
                element.classList.add('hidden');
            });
            // Show fields based on selected role
            document.getElementById(role + 'Fields').classList.remove('hidden');
        });
    
        // Trigger change event when the page loads to initially show the correct fields
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('roleSelect').dispatchEvent(new Event('change'));
        });
    </script>
    
</x-layout>