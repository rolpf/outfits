<?php

namespace App\Policies;

use App\Models\Cloth;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClothPolicy
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
    public function view(User $user, Cloth $cloth): bool
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
    public function update(User $user, Cloth $cloth): Response
    {
        return $user->id === $cloth->user_id
            ? Response::allow()
            : Response::deny(__('You do not own this cloth.'));
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Cloth $cloth): Response
    {
        return $user->id === $cloth->user_id
            ? Response::allow()
            : Response::deny(__('You do not own this cloth.'));
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Cloth $cloth): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Cloth $cloth): Response
    {
        return $user->id === $cloth->user_id
            ? Response::allow()
            : Response::deny(__('You do not own this cloth.'));
    }
}
