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