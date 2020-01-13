<?php

namespace App\Policies;

use App\User;
use Tblentcln;
use Illuminate\Auth\Access\HandlesAuthorization;

class TblentclnPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Tblentcln $tblentcln)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function create(User $user, Tblentcln $tblentcln)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function update(User $user, Tblentcln $tblentcln)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function delete(User $user, Tblentcln $tblentcln)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }
}