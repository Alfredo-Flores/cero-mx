<?php

namespace App\Policies;

use App\User;
use Tblentsrv;
use Illuminate\Auth\Access\HandlesAuthorization;

class TblentsrvPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Tblentsrv $tblentsrv)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function create(User $user, Tblentsrv $tblentsrv)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function update(User $user, Tblentsrv $tblentsrv)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function delete(User $user, Tblentsrv $tblentsrv)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }
}