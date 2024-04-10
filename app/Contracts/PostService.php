<?php

namespace App\Contracts;

use App\Models\User;

// draw posts on the profile

interface PostService
{
    public static function ShowPosts(Object $posts, User $user);
}

?>
