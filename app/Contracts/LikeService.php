<?php

namespace App\Contracts;

use App\Models\Post;
use App\Models\User;
use PhpParser\Node\Expr\Cast\Object_;

// draw posts on the profile

interface LikeService
{
    public function ShowLike(Post $post, ?User $user): string;
    
    public function FindLike(User $user, Post $post): bool;

    public function BtnWithLike(Post $post): string;

    public function BtnWithoutLike(Post $post): string;

    public function AddLike(User $user, Post $post): string;

    public function RemoveLike(User $user, Post $post): string;
}

?>
