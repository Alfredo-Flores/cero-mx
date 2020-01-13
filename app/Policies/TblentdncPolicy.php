<?php

namespace App\Policies;

use App\User;
use Tblentdnc;
use Illuminate\Auth\Access\HandlesAuthorization;

class TblentdncPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Tblentdnc $tblentdnc)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function create(User $user, Tblentdnc $tblentdnc)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function update(User $user, Tblentdnc $tblentdnc)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function delete(User $user, Tblentdnc $tblentdnc)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }
}