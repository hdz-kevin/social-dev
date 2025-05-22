<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProfilePolicy
{
    /**
     * Determine whether the user can view the user's profile.
     */
    public function view(User $user, User $userProfile): bool
    {
        //
    }

    /**
     * Determine whether the user can view the form for editing a user's profile.
     */
    public function edit(User $user, User $userProfile): bool
    {
        return $user->id === $userProfile->id;
    }

    /**
     * Determine whether the user can update the user's profile.
     */
    public function update(User $user, User $userProfile): bool
    {
        //
    }
}
