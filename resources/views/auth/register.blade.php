<x-layout title="Create a new Account">
    <x-slot:heading>Sign In</x-slot:heading>
    <x-auth-card title="Create your account" description="Join our community today">
        <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <x-label for="name" value='Full Name' />
                    <x-input id="name" name="name" type="text" autocomplete="name" required
                        placeholder="Full name" :value="old('name')" />
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-label for="email" value="Email Address" />
                    <x-input id="email" name="email" type="email" autocomplete="email" required

                        placeholder="Email address" :value="old('email')" />
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-label for="password" value="Password" />
                    <x-input id="password" name="password" type="password" autocomplete="new-password" required

                        placeholder="Password" />
                    @error('password')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <x-label for="password_confirmation" value="Confirm Password" />
                    <x-input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required

                        placeholder="Confirm Password" />
                </div>
            </div>

            <div>
                <x-button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Register
                </x-button>
            </div>
        </form>

        @slot('footer')

        <div class="text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">
                Sign in here
            </a>
        </div>

        @endslot
    </x-auth-card>
</x-layout>
