<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class Logincontroller extends Controller
{
    public function login(Request $request){
       try{ $credentials = $request->validate([
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
            return response()->json([
            'message' => 'Email not verified',
            'verified' => false,
            'user' => $user,
            'resend_link' => route('verification.resend')
            ], 200);
        }

        Log::debug('User before token creation', ['user_id' => $user->id]);

        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
            'token_type'=>'Bearer',
            'redirect' => $this->getRedirectRoute($user)
        ]);
    }catch (\Exception $e) {
            Log::error('Login error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'message' => 'Internal server error',
                'error' => $e->getMessage() // Only in development
            ], 500);
        }
    }
    protected function getRedirectRoute(User $user){
        if($user->isAdmin()) return '/admin/dashboard';
        if($user->isReader()) return '/';

        return '/';
    }


    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message'=> 'Successfully Logged Out'
        ],200);
    }
}
