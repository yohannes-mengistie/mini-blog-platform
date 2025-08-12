<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $writersCount = User::where('role', 'writer')->where('is_approved',true)->count();
        $pendingWriters = User::where('role', 'reader')->where('writer_requested', true)->get();
        $pendingWritersCount = $pendingWriters->count();
        $activities = Activity::latest()->take(10)->get();

        return view('admin.dashboard', compact('usersCount', 'writersCount', 'pendingWriters','pendingWritersCount','activities'));
    }
}
