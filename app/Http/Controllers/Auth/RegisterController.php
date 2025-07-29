<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }

    // validating and creating the user

    public function store(Request $request){
        $attributes = request()-> validate([
            'name' => ['required'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required',Password::min(8),'confirmed'],
        ]);

        // create user

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'reader', // Default role
        ]);

        // dispach the registration

        event(new Registered($user));

        Auth::login($user);

        //return redirect()->route('login');
        return redirect()->route('verification.notice');
    }
}
