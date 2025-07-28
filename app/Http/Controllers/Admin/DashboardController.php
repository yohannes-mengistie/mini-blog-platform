<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $usersCount = User::count();
        $writersCount = User::where('role', 'writer')->count();
        $pendingWriters = User::where('role', 'writer')->where('is_approved', false)->count();

        return view('admin.dashboard', compact('usersCount', 'writersCount', 'pendingWriters'));
    }
}