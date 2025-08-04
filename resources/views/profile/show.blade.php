@props(['heading' => 'Your Profile'])

<x-layout title="Profile">
    <x-slot:heading>{{$heading}}</x-slot:heading>
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $user->name }}'s Profile</h2>
            <div class="space-y-4">
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Role:</strong> {{ ucfirst($user->role) }}</p>

                @if ($user->role === 'reader' && !$user->writer_requested)
                    <form action="{{ route('profile.requestWriter') }}" method="POST">
                        @csrf
                        <button type="submit" class="relative inline-flex items-center justify-center px-6 py-2 text-base font-normal text-white bg-black border border-transparent rounded-full hover:bg-gray-900 transition">
                            Request Writer Role
                        </button>
                    </form>
                @elseif ($user->role === 'reader' && $user->writer_requested)
                    <p class="text-blue-600">Writer role request pending approval.</p>
                @elseif ($user->role === 'writer' && $user->is_approved)
                    <p class="text-green-600">You are an approved writer.</p>
                @endif
            </div>

            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                     class="mt-4 px-6 py-4 bg-green-500 text-white rounded-lg shadow-lg">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                     class="mt-4 px-6 py-4 bg-red-500 text-white rounded-lg shadow-lg">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</x-layout>
