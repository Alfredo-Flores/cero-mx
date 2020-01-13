<?php

namespace App\Policies;

use App\User;
use Tblentprs;
use Illuminate\Auth\Access\HandlesAuthorization;

class TblentprsPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Tblentprs $tblentprs)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function create(User $user, Tblentprs $tblentprs)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function update(User $user, Tblentprs $tblentprs)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function delete(User $user, Tblentprs $tblentprs)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }
}