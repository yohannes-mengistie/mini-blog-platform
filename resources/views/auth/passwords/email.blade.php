<x-layout title="Reset your password">
    <x-slot:heading>Sign In</x-slot:heading>
    <X-auth-card title=" Reset your password"
        description="Enter your email and we'll send you a link to reset your password">
        <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <form class="mt-8 space-y-6" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="rounded-md shadow-sm ">
                        <div>
                            <label for="email" class="sr-only">Email address</label>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm"
                                placeholder="Email address" value="{{ old('email') }}">
                            @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Send Password Reset Link
                        </button>
                    </div>

                    <div class="text-center text-sm">
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                            Back to login
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </X-auth-card>
</x-layout>
