@extends('admin.layout')

@section('title', 'User Details')

@section('content')
<div class="bg-white shadow rounded-lg overflow-hidden">
    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            User Details: {{ $user->name }}
        </h3>
    </div>
    <div class="px-4 py-5 sm:p-6">
        <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
            <div class="sm:col-span-1">
                <label class="block text-sm font-medium text-gray-700">Profile</label>
                <div class="mt-1 flex items-center">
                    <div class="flex-shrink-0 h-16 w-16 rounded-full bg-gray-300 flex items-center justify-center">
                        <i class="fas fa-user text-gray-600 text-2xl"></i>
                    </div>
                    <div class="ml-4">
                        <div class="text-lg font-medium text-gray-900">{{ $user->name }}</div>
                        <div class="text-sm text-gray-500">{{ $user->email }}</div>
                    </div>
                </div>
            </div>

            <div class="sm:col-span-1">
                <label class="block text-sm font-medium text-gray-700">Role</label>
                <div class="mt-1">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $user->role === 'admin' ? 'bg-purple-100 text-purple-800' : 
                           ($user->role === 'writer' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
            </div>

            <div class="sm:col-span-1">
                <label class="block text-sm font-medium text-gray-700">Email Verified</label>
                <div class="mt-1">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $user->email_verified_at ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $user->email_verified_at ? 'Verified' : 'Not Verified' }}
                    </span>
                </div>
            </div>

            @if($user->role === 'writer')
            <div class="sm:col-span-1">
                <label class="block text-sm font-medium text-gray-700">Approval Status</label>
                <div class="mt-1">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                        {{ $user->is_approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $user->is_approved ? 'Approved' : 'Pending Approval' }}
                    </span>
                </div>
            </div>
            @endif

            <div class="sm:col-span-1">
                <label class="block text-sm font-medium text-gray-700">Registered</label>
                <div class="mt-1 text-sm text-gray-900">
                    {{ $user->created_at->format('M d, Y H:i') }}
                </div>
            </div>

            <div class="sm:col-span-1">
                <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                <div class="mt-1 text-sm text-gray-900">
                    {{ $user->updated_at->format('M d, Y H:i') }}
                </div>
            </div>
        </div>

        <div class="mt-6 border-t border-gray-200 pt-6">
            <div class="flex justify-end">
                <a href="{{ route('admin.users.edit', $user) }}" class="ml-3 inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-edit mr-2"></i> Edit User
                </a>
            </div>
        </div>
    </div>
</div>
@endsection