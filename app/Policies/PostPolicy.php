<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->role === 'admin') {
            return true;
        }
    }

    public function update(User $user, Post $post)
    {
        return $user->role === 'is_admin';
    }

    public function delete(User $user, Post $post)
    {
        return $user->role === 'is_admin';
    }
}
