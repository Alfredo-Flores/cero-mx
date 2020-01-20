<?php

namespace App\Policies;

use App\User;
use Users;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Users $users)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function create(User $user, Users $users)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function update(User $user, Users $users)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function delete(User $user, Users $users)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }
}