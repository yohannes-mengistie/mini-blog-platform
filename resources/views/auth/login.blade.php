<x-layout title="Sign In">
    <x-slot:heading>Sign In</x-slot:heading>
    <x-auth-card title="Welcome back" description="Sign in to your account">
        @if($errors->any())
            <div class="mb-4 p-4 bg-red-50 text-red-700 rounded-lg">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <x-label for="email" value="Email Address" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div>
                <x-label for="password" value="Password" />
                <x-input id="password" type="password" name="password" required />
            </div>

            <div class="flex items-center justify-between">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>

                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-500">
                        Forgot password?
                    </a>
                @endif
            </div>

            <x-button type="submit" class="w-full">
                Sign In
            </x-button>
        </form>

        @slot('footer')
            <p class="text-sm text-gray-600">
                Don't have an account?
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">
                    Register here
                </a>
            </p>
        @endslot
    </x-auth-card>
</x-layout>
