<?php

namespace App\Contracts;

use App\Models\User;
use PhpParser\Node\Expr\Cast\Object_;

// draw posts on the profile

interface UserService
{
    public function FindSearch(String $searchText);

    public function FindFollowers(User $user);

    public function FindFollows(User $user);

    public function ShowUsers(Object $users);
}

?>
