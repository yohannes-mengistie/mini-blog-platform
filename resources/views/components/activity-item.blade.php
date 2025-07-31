@props(['activity'])

@php
    $icons = [
        'user_registered' => 'user-plus text-green-500',
        'writer_approved' => 'check-circle text-blue-500',
        'writer_rejected' => 'times-circle text-red-500',
    ];
@endphp

<li class="px-4 py-4 sm:px-6">
    <div class="flex items-center">
        <div class="min-w-0 flex-1 flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-{{ explode(' ', $icons[$activity->type] ?? 'info-circle text-gray-500')[0] }} 
                   text-{{ explode(' ', $icons[$activity->type] ?? 'info-circle text-gray-500')[1] }}"></i>
            </div>
            <div class="min-w-0 flex-1 px-4">
                <div>
                    <p class="text-sm text-gray-900">
                        {{ $activity->description }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $activity->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</li>