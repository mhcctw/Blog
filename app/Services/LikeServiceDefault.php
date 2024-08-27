<?php

namespace App\Services;

use Exception;
use App\Models\Post;
use App\Models\User;
use App\Contracts\LikeService;
use Illuminate\Support\Facades\Redis;


class LikeServiceDefault implements LikeService{

    public function ShowLike(User $user, Post $post){      

        $bool = self::FindLike($user, $post);

        // without like
        if(!$bool){
            $string = self::BtnWithoutLike($post);
        }
        // with like
        else{
            $string = self::BtnWithLike($post);  
        }

        return html_entity_decode($string);

    }

    public function FindLike(User $user, Post $post){

        $hasLiked = Redis::sismember('post:' . $post->id . ':likes', $user->id);
        return $hasLiked;

    } 
    
    // HTML with like
    public function BtnWithLike(Post $post){
        $count = Redis::scard('post:' . $post->id . ':likes');

        $string ='<a class="unlike-btn" style="cursor:pointer" data-post="'.$post['id'].'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-star" viewBox="0 0 24 24">
                            <path d="M10.0802 7.89712C11.1568 5.96571 11.6952 5 12.5 5C13.3048 5 13.8432 5.96571 14.9198 7.89712L15.1984 8.3968C15.5043 8.94564 15.6573 9.22007 15.8958 9.40114C16.1343 9.5822 16.4314 9.64942 17.0255 9.78384L17.5664 9.90622C19.6571 10.3793 20.7025 10.6158 20.9512 11.4156C21.1999 12.2153 20.4872 13.0487 19.0619 14.7154L18.6932 15.1466C18.2881 15.6203 18.0856 15.8571 17.9945 16.1501C17.9034 16.443 17.934 16.759 17.9953 17.3909L18.051 17.9662C18.2665 20.19 18.3742 21.3019 17.7231 21.7962C17.072 22.2905 16.0932 21.8398 14.1357 20.9385L13.6292 20.7053C13.073 20.4492 12.7948 20.3211 12.5 20.3211C12.2052 20.3211 11.927 20.4492 11.3708 20.7053L10.8643 20.9385C8.90677 21.8398 7.928 22.2905 7.27688 21.7962C6.62575 21.3019 6.7335 20.19 6.94899 17.9662L7.00474 17.3909C7.06597 16.759 7.09659 16.443 7.00548 16.1501C6.91438 15.8571 6.71186 15.6203 6.30683 15.1466L5.93808 14.7154C4.51276 13.0487 3.8001 12.2153 4.04881 11.4156C4.29751 10.6158 5.34288 10.3793 7.43361 9.90622L7.9745 9.78384C8.56862 9.64942 8.86568 9.5822 9.1042 9.40114C9.34272 9.22007 9.4957 8.94565 9.80165 8.3968L10.0802 7.89712Z" fill="#f5c211"></path> <path opacity="0.5" d="M4.86752 2.50058C4.89751 2.3948 5.08528 2.39416 5.11598 2.49974C5.25618 2.98185 5.51616 3.69447 5.90928 4.08495C6.30241 4.47543 7.01676 4.73058 7.49981 4.86752C7.6056 4.89751 7.60623 5.08528 7.50065 5.11598C7.01854 5.25618 6.30592 5.51616 5.91545 5.90928C5.52497 6.30241 5.26981 7.01676 5.13287 7.49981C5.10288 7.6056 4.91511 7.60623 4.88441 7.50065C4.74421 7.01854 4.48424 6.30592 4.09111 5.91545C3.69798 5.52497 2.98363 5.26981 2.50058 5.13287C2.3948 5.10288 2.39416 4.91511 2.49974 4.88441C2.98185 4.74421 3.69447 4.48424 4.08495 4.09111C4.47543 3.69798 4.73058 2.98363 4.86752 2.50058Z" fill="#f5c211"></path> <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M19 3.25C19.4142 3.25 19.75 3.58579 19.75 4V4.25H20C20.4142 4.25 20.75 4.58579 20.75 5C20.75 5.41421 20.4142 5.75 20 5.75H19.75V6C19.75 6.41421 19.4142 6.75 19 6.75C18.5858 6.75 18.25 6.41421 18.25 6V5.75H18C17.5858 5.75 17.25 5.41421 17.25 5C17.25 4.58579 17.5858 4.25 18 4.25H18.25V4C18.25 3.58579 18.5858 3.25 19 3.25Z" fill="#f5c211"></path> 
                        </svg>'.$count.' 
                    </a>';
        return $string;
    } 

    // HTML without like
    public function BtnWithoutLike(Post $post){

        $count = Redis::scard('post:' . $post->id . ':likes');

        $string ='<a class="like-btn" style="cursor:pointer" data-post="'.$post['id'].'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                        </svg>  '.$count.'                      
                    </a>';
        return $string;
    } 
    
    public function AddLike(User $user, Post $post){

        try {
            
            Redis::sadd('post:'.$post->id.':likes', $user->id);

            $string = self::BtnWithLike($post);

            return $string;
            
        } catch (Exception $e) {
            // return 'Error adding like: ' . $e->getMessage();
        }

    }

    public function RemoveLike(User $user, Post $post){

        Redis::srem('post:'.$post->id.':likes', $user->id);

        $string = self::BtnWithoutLike($post);

        return $string;

    }

}

?>