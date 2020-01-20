<?php

namespace App\Policies;

use App\User;
use Tblentemp;
use Illuminate\Auth\Access\HandlesAuthorization;

class TblentempPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Tblentemp $tblentemp)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function create(User $user, Tblentemp $tblentemp)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function update(User $user, Tblentemp $tblentemp)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function delete(User $user, Tblentemp $tblentemp)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }
}