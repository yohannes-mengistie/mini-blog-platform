@props(['title', 'description' => ''])

<div class="min-h-screen flex items-center justify-center px-4 sm:px-0">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-center text-gray-800">{{ $title }}</h2>
            @if($description)
                <p class="mt-1 text-center text-sm text-gray-600">{{ $description }}</p>
            @endif
        </div>
        
        <div class="px-6 py-4">
            {{ $slot }}
        </div>
        
        @isset($footer)
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 text-center">
                {{ $footer }}
            </div>
        @endisset
    </div>
</div>