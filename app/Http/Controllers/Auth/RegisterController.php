<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function show(){
        return view('auth.register');
    }

    // validating and creating the user

    public function store(){
        $attributes = request()-> validate([
            'name' => ['required'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required',Password::min(8),'confirmed'],
        ]);

        // create user

        $user = User::create($attributes);

        // dispach the registration

        event(new Registered($user));

        return redirect()->route('login')->with('success' , 'Registration successfull! Please check you email for verification');
    }
}
