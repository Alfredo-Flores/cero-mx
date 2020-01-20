<?php

namespace App\Policies;

use App\User;
use Catgirorg;
use Illuminate\Auth\Access\HandlesAuthorization;

class CatgirorgPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Catgirorg $catgirorg)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function create(User $user, Catgirorg $catgirorg)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function update(User $user, Catgirorg $catgirorg)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }

    public function delete(User $user, Catgirorg $catgirorg)
    {
        // Update $user authorization to view $viehicle here.
        return true;
    }
}