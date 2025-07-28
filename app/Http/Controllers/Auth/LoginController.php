<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use App\Providers\RouteServiceProvider;
use PhpParser\Builder\Function_;

class LoginController extends Controller
{
    public function show(){
        return view('auth.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required' , 'email'],
            'password' => ['required']
        ]);

        if(!Auth::attempt($credentials , $request->boolean('remember'))){
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),]
            );
        }

        $request->session()->regenerate();
        $user = Auth::user();
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['email' => 'No authenticated user found.']);
        }

        if(!$user->hasVerifiedEmail()){
            Auth::logout();
            return redirect()->route('verification.notice');
        }

        if($user->isWriter() && !$user->is_approved){
            Auth::logout();
            return back()->with('error','Your account is pending approval from admin.');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }



   

}
