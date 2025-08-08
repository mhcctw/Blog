<?php

namespace App\Contracts;

use App\Models\Post;
use App\Models\User;

// draw posts on the profile

interface PostService
{
    public function ShowUserPosts(Object $posts, User $user): string;

    public function ShowPosts(Object $posts): string;

    public function generateNoPostsMessage(User $user): string;

    public function generatePostsHeader(User $user): string;

    public function generatePostHtml(Post $post): string;    
    
}

?>
