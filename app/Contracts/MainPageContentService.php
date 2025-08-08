<?php

namespace App\Contracts;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

// get content for main page index.php
interface MainPageContentService
{
    /**
     * @return Collection<int, Post>
     */
    public function GetContent(): Collection;
    /**
     * @param User $user
     * @return Collection<int, Post>
     */
    public function GetContentAuth(User $user): Collection;
    /**
     * @return Collection<int, Post>
     */
    public function GetContentGuest(): Collection;
}

?>