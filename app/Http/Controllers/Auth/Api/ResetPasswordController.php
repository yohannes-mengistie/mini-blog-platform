<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password as PasswordRule;

class ResetPasswordController extends Controller
{
    public function reset(Request $request){
        $validator = Validator::make($request->all(),[
            'token' => ['required'],
            'email' => ['required','email'],
            'password' => ['required','confirmed',PasswordRule::defaults()]
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' =>$validator->errors()
            ],422);
        }

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if($status == Password::PASSWORD_RESET){
               return response()->json([
                'success' =>true,
                'message'=> __($status),
                'data' => [
                    'email'=> $request->email
                ]
                ]);
        }

        return response()->json([
            'success' =>false,
            'message' => __($status),
            'errors' => [
                'email' => [__($status)]
            ]
            ],400);
        }


}
