<?php

namespace App\Policies;

use App\Models\Outfit;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OutfitPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Outfit $outfit): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Outfit $outfit): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Outfit $outfit): Response
    {
        return $user->id === $outfit->user_id
            ? Response::allow()
            : Response::deny(__('You do not own this outfit.'));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Outfit $outfit): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Outfit $outfit): bool
    {
        //
    }
}
