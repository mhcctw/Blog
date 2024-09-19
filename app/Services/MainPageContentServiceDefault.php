<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use App\Models\Subscription;
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

        // followed users ids
        $followedUsersIds = Subscription::where('user_id', $user->id)
                            ->pluck('follow');
                            
        $followedUsersIds[] = $user->id;

        $posts = Post::whereIn('user_id', $followedUsersIds)
                ->orderBy('created_at', 'desc')
                ->get();

        return $posts;        
    }

    public function GetContentGuest(){

    }
}

?>