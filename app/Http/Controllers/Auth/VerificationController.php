<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


class VerificationController extends Controller
{
    
    public function notice(Request $request){
        return $request->user()->hasVerifiedEmail()
        ? redirect()->route('home')
        : view('auth.verify-email');
    }
    
    // manual and very verbose implementation

   public function verify(EmailVerificationRequest $request)
{
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('home');
    }

    if ($request->user()->markEmailAsVerified()) {
        event(new Verified($request->user()));
    }

    return redirect()->route('home')->with('status', 'Your email has been verified!');
}

    // public function verify(EmailVerificationRequest $request){
    //     $request->fulfill();
    //     return redirect()->route('home');
    // }
    
    public function send(Request $request){
        if($request->user()->hasVerifiedEmail()){
            return redirect()->route('home');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status' , 'Verification link sent!');
    }
    
}
