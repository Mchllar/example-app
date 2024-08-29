<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
      <p class="mb-4">Log into your account</p>
    </header>

    @if(session('error'))
      <p class="text-red-500 text-center text-xs mb-4">
        {{ session('error') }}
      </p>
    @endif

    <form method="POST" action="{{ url('/users/authenticate') }}">
      @csrf

      <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">Email</label>
        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{ old('email') }}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2">Password</label>
        <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />

        @error('password')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
          Sign In
        </button>
      </div>

      <div class="mt-2">
        <p>
          Forgot Your Password?
          <a href="{{ route('password.request') }}" class="text-laravel">Reset here</a>
        </p>
      </div>
    </form>
  </x-card>
</x-layout>
