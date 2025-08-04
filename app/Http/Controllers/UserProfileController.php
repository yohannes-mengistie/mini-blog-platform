<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('profile.show', ['user' => Auth::user()]);
    }
    public function requestWriter()
    {
        $user = Auth::user();
        // dd($user, get_class($user), in_array('update', get_class_methods($user)));
        if ($user->role !== 'reader') {
            return back()->with('error', 'Only readers can request to become writers.');
        }


        if ($user->writer_requested) {
            return back()->with('error', 'You have already requested writer status.');
        }
        try{
            // oldis approach
            // $user->writer_requested = true;
            // $user->save();
            
            \App\Models\User::where('id',$user->id)->update(['writer_requested' => true]);
            return back()->with('success', 'Writer role requested successfully, Awaiting admin approval.');
        }catch(\Exception $e){
            return back()->with('error','Failed to update your request: '. $e->getMessage());
        }

    }
}
