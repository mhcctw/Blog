<?php

namespace App\Contracts;

use App\Models\Post;
use App\Models\User;
use PhpParser\Node\Expr\Cast\Object_;

// draw posts on the profile

interface LikeService
{
    public function ShowLike(User $user, Post $post);
    
    public function FindLike(User $user, Post $post);

    public function BtnWithLike(Post $post);

    public function BtnWithoutLike(Post $post);

    public function AddLike(User $user, Post $post);

    public function RemoveLike(User $user, Post $post);
}

?>
