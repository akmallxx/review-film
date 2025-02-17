<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;

class CommentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->id_user || $user->hasRole('admin'); // hanya pengirim komentar yang dapat menghapus
    }
    public function update(User $user, Comment $comment)
    {
        return $user->id === $comment->id_user;
    }
}
