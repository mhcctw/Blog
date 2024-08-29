<?php

namespace App\Contracts;

use App\Models\Post;
use App\Models\User;

// draw posts on the profile

interface PostService
{
    public function ShowUserPosts(Object $posts, User $user);

    public function generateNoPostsMessage(User $user);

    public function generatePostsHeader(User $user);

    public function generatePostHtml(Post $post);    
    
}

?>
