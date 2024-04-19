<?php

namespace App\Contracts;

use App\Models\User;
use PhpParser\Node\Expr\Cast\Object_;

// draw posts on the profile

interface UserService
{
    public static function FindSearch(String $searchText);

    public static function FindFollowers(User $user);

    public static function FindFollows(User $user);

    public static function ShowUsers(Object $users);
}

?>
