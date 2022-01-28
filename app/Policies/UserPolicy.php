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

    public function update(User $auth, User $user) {
        return $auth->id === $user->id;
    }

    public function before($user)
    {
    if (auth()->user()->is_admin == 1){
        return true;
    }}
}
