<?php

namespace App\Policies;

use App\User;
use Tblentorg;
use Illuminate\Auth\Access\HandlesAuthorization;

class TblentorgPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Tblentorg $tblentorg)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function create(User $user, Tblentorg $tblentorg)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function update(User $user, Tblentorg $tblentorg)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function delete(User $user, Tblentorg $tblentorg)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }
}