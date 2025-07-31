<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Logincontroller extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if(!Auth::attempt($credentials)){
            return response()->json(['message' => __('auth.failed')] , 401);
        }

         /** @var User $user */

        $user = Auth::user();
        if(!$user->hasVerifiedEmail()){
            return response()->json(['message' => 'Email not verified'],403);
        }

        if(method_exists($user , 'isWriter') && $user->isWriter() && !$user->is_approved){
            return response()->json(['message' => 'Account pending admin approval'], 403);
        }

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'redirect' => $this->getRedirectRoute($user)
        ]);
    }

    protected function getRedirectRoute(User $user){
        if($user->isAdmin()) return '/admin/dashboard';
        if($user->isReader()) return '/';

        return '/';
    }
}
