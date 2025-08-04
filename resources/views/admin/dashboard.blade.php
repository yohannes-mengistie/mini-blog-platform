@extends('admin.layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Total Users Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <i class="fas fa-users text-white"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Total Users
                        </dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900">
                                {{ $usersCount }}
                            </div>
                        </dd>
                    </div>
                </div>
            </div>
        </div>

        <!-- Writers Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <i class="fas fa-pen-fancy text-white"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Writers
                        </dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900">
                                {{ $writersCount }}
                            </div>
                        </dd>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Writers Card -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                        <i class="fas fa-clock text-white"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dt class="text-sm font-medium text-gray-500 truncate">
                            Pending Writers
                        </dt>
                        <dd class="flex items-baseline">
                            <div class="text-2xl font-semibold text-gray-900">
                                {{ $pendingWritersCount }}
                            </div>
                        </dd>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Writer Requests -->
    @if ($pendingWriters->isNotEmpty())
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Pending Writer Requests</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($pendingWriters as $writer )
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $writer->name}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $writer->email}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{route('admin.users.approve',$writer)}}" method="POST" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-white bg-green-600 hover:bg-green-700 px-4 py-2 rounded-full text-sm">Approve</button>

                                    </form>
                                    <form action="{{route('admin.users.rejectWriter',$writer)}}" method="POST" class="inline ml-2">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-white bg-green-600 hover:bg-red-700 px-4 py-2 rounded-full text-sm">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>
        @else
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <p class="text-gray-600">No pending writer requests.</p>
        </div>

    @endif
    <!-- Recent Activity Section -->
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Recent Activity
            </h3>
        </div>
        <div class="bg-white overflow-hidden">
            <ul class="divide-y divide-gray-200">
                @foreach ($activities as $activity )
                <x-activity-item :activity="$activity" />

                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
