<?php

namespace App\Policies;

use App\User;
use Cattipsrv;
use Illuminate\Auth\Access\HandlesAuthorization;

class CattipsrvPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Cattipsrv $cattipsrv)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function create(User $user, Cattipsrv $cattipsrv)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function update(User $user, Cattipsrv $cattipsrv)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function delete(User $user, Cattipsrv $cattipsrv)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }
}