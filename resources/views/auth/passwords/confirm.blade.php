<x-layout title="Confirm Password">
    <x-slot:heading>Sign In</x-slot:heading>
    <x-auth-card title="Confirm Password" description="Please confirm your password before continuing.">
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">

        <form class="mt-8 space-y-6" method="POST" action="{{ route('password.confirm.submit') }}">
            @csrf

            <div class="rounded-md shadow-sm">
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                        placeholder="Password">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Confirm Password
                </button>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center text-sm">
                    <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-500">
                        Forgot Your Password?
                    </a>
                </div>
            @endif
        </form>
    </div>
</div>

    </x-auth-card>
</x-layout>
