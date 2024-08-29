<?php

namespace App\Contracts;

use App\Models\User;

// get content for main page index.php

interface MainPageContentService
{
    public function GetContent();

    public function GetContentAuth(User $user);

    public function GetContentGuest();
}

?>