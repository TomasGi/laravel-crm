<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        if ($user->can('create user manager')) {
            return true;
        }

        if ($user->can('create user worker')) {
            return true;
        }

    }

    public function createUserManager(User $user)
    {
        if ($user->can('create user manager')) {
            return true;
        }
    }

    public function createUserWorker(User $user)
    {
        if ($user->can('create user worker')) {
            return true;
        }
    }
}
