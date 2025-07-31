<?php

namespace App\Observers;

use App\Models\Activity;
use App\Models\User;

class ActivityObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        Activity::create([
            'type' => 'user_registered',
            'subject_id' => $user->id,
            'subject_type' => User::class,
            'description' => "New User registered: {$user->name}",
            'data' => json_encode(['email' => $user->email])

        ]);
    }

    // custome function

    public function approve(User $user){
        $user->update(['is_approved' => true]);

        Activity::create([
            'type' => 'writer_approved',
            'subject_id' => $user->id,
            'subject_type' => User::class,
            'description' => "writer approved: {$user->name}",
            'user_id' => auth()->id()
        ]);

        return back()->with('success','writer approved');
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
