@props(['title' => config('app.name', 'Laravel')])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body {{ $attributes->merge(['class' => 'font-sans antialiased bg-gray-50']) }}>
    <nav class="bg-gray-800">
        <div class="flex h-16 items-center justify-between ">
            <div class="hidden md:flex justify-right pr-4">
                <div class="mr-auto flex items-center gap-4">
                    @guest
                        <x-navlink href="{{route('login')}}" :active="request()->is('login')">Log In</x-navlink>
                        <x-navlink href="{{route('register')}}" :active="request()->is('register')">Register</x-navlink>
                    @endguest
                    @auth
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <x-button href="{{route('logout')}}">Log Out</x-button>
                    </form>
                    @endauth


                </div>

            </div>
        </div>

    </nav>

    <header class="bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            <a href='/blogs/create'
               class="mt-6 relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800"
            >Create Blog</a>
        </div>
    </header>

    {{ $slot }}

    <!-- Flash messages -->
    @if(session('status'))
        <div x-data="{ show: true }"
             x-show="show"
             x-transition
             x-init="setTimeout(() => show = false, 3000)"
             class="fixed bottom-4 right-4 px-6 py-4 bg-green-500 text-white rounded-lg shadow-lg">
            {{ session('status') }}
        </div>
    @endif
</body>
</html>
