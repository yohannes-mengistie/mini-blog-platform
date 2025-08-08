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
        <div class="container mx-auto flex h-16 items-center justify-between ">
            <div class="shrink-0">
                <img class="size-8" src="https://laracasts.com/images/logo/logo-triangle.svg" alt="Your Company" />
            </div>
            <div class=" flex items-center gap-4">
                @guest
                    <x-navlink href="{{ route('login') }}" :active="request()->is('login')">Log In</x-navlink>
                    <x-navlink href="{{ route('register') }}" :active="request()->is('register')">Register</x-navlink>
                @endguest
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <x-button href="{{ route('logout') }}">Log Out</x-button>
                    </form>
                    <x-navlink href="{{route('profile.show')}}">Profile</x-navlink>
                @endauth


            </div>

        </div>


    </nav>

    <header class="bg-white shadow-sm">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 sm:flex sm:justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
            <div class="relative inline-flex items-center justify-center group">
                <div
                    class="absolute transition-all duration-200 rounded-full -inset-px bg-gradient-to-r from-cyan-500 to-purple-500 group-hover:shadow-lg group-hover:shadow-cyan-500/50">
                </div>
               @if (Auth::user() && Auth::user()->hasRole('writer'))
                     <a href="{{route('blogs.create')}}" title=""
                    class="relative inline-flex items-center justify-center w-full px-6 py-2 text-base font-normal text-white bg-black border border-transparent rounded-full"
                    role="button"> Create Blog </a>
               @endif
            </div>
        </div>
    </header>

    {{ $slot }}

    <!-- Flash messages -->
    @if (session('status'))
        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
            class="fixed bottom-4 right-4 px-6 py-4 bg-green-500 text-white rounded-lg shadow-lg">
            {{ session('status') }}
        </div>
    @endif
</body>

</html>
