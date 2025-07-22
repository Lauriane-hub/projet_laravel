<?php

namespace App\Policies;

use App\Models\Stand;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StandPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Stand $stand): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Stand $stand): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Stand $stand): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Stand $stand): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Stand $stand): bool
    {
        return false;
    }

        public function update(User $user, Stand $stand): bool
    {
        // L'utilisateur peut mettre à jour le stand SEULEMENT SI son ID
        // est le même que le user_id du stand.
        return $user->id === $stand->user_id;
    }

    

}
