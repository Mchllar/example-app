<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">Reset Password</h2>
        </header>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email Address</label>
                <input id="email" type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">Password</label>
                <input id="password" type="password" class="border border-gray-200 rounded p-2 w-full" name="password" required>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">Confirm Password</label>
                <input id="password_confirmation" type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" required>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Reset Password
                </button>
            </div>
        </form>
    </x-card>
</x-layout>
