<?php

namespace App\Contracts;

use App\Models\User;
use PhpParser\Node\Expr\Cast\Object_;

// draw posts on the profile

interface UserService
{
    public function FindSearch(String $searchText): string;

    public function FindFollowers(User $user): string;

    public function FindFollows(User $user): string;

    public function ShowUsers(Object $users): string;
}

?>
