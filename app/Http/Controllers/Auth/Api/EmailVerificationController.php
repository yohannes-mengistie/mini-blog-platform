<?php

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Verified;

class EmailVerificationController extends Controller
{
    public function notice(Request $request)
    {
        return response()->json([
            'message' => $request->user()->hasVerifiedEmail()
                ? 'Email already verified'
                : 'Email verification required',
            'verified' => $request->user()->hasVerifiedEmail()
        ], $request->user()->hasVerifiedEmail() ? 200 : 403);
    }

    public function verify(Request $request, $id, $hash)
{
    // 1. Find the user
    $user = User::find($id);
    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // 2. Check if already verified
    if ($user->hasVerifiedEmail()) {
        return response()->json(['message' => 'Email already verified'], 200);
    }

    // 3. Verify the hash (critical for security)
    if (!hash_equals((string) $hash, sha1($user->email))) {
        return response()->json(['message' => 'Invalid verification link'], 403);
    }

    // 4. Mark as verified
    $user->markEmailAsVerified();
    event(new Verified($user));

    return response()->json([
        'message' => 'Email successfully verified',
        'verified' => true
    ]);
}

    public function send(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return response()->json([
                'message' => 'Email already verified',
                'verified' => true
            ], 200);
        }

        $request->user()->sendEmailVerificationNotification();

        return response()->json(['message' => 'Verification link sent']);
    }
}
