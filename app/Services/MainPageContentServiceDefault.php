<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Contracts\MainPageContentService;

class MainPageContentServiceDefault implements MainPageContentService{

    public function GetContent(){

        $user = Auth::user();

        if($user){
            $posts = $this->GetContentAuth($user);
        }else{
            $posts = $this->GetContentGuest();
        }

        return $posts;
    }

    public function GetContentAuth(User $user){
        
    }

    public function GetContentGuest(){

    }
}

?>