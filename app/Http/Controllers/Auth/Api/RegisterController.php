<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
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
            'role' => 'reader',
        ]);

        event(new Registered($user));

        $token = $user->createToken('auth_token')->plainTextToken;

        if($request->wantsJson()){
            return response()->json([
                'message'=> 'Registration successful. Please verify your email.',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ], 201);
        }

        Auth::login($user);
        return redirect()->route('verification.notice');
    }
}
