<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{

    public function viewAny(User $user)
    {
        //
    }


    public function view(User $user, Post $post)
    {
        //
    }


    public function create(User $user)
    {
        //
    }

    public function update(User $user, Post $post)
    {
        //
    }


    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id; 
    }

    public function restore(User $user, Post $post)
    {
        //
    }

    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
