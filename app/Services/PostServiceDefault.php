<?php

namespace App\Services;

use App\Models\User;
use App\Contracts\PostService;

// draw posts on the profile

class PostServiceDefault implements PostService
{
    public static function ShowPosts(Object $posts, User $user){
        if(!isset($posts)){
            $string = '<div class="col-lg-12 text-center">
                            <div class="section-heading">          
                            <h2>You don\'t have any posts yet</h2>
                            </div>
                        </div>';


        }else{
            $string = '<div class="col-lg-12 text-center">
                            <div class="section-heading">          
                            <h2>Your Posts:</h2>
                            </div>
                        </div>';
            

            foreach ($posts as $post){
                $string.='<div class="col-lg-12 col-md-6">
                            <div class="item">
                                <div class="row">';

                // user's avatar                
                $string .= '<div class="col-lg-1">
                                <img style="border-radius:50%;" src="'.(!empty($user['photo']) ? url('assets/images/avatars/'.$post->user->photo) : url('assets/images/no_image.png')).'" alt="avatar">
                            </div>';

                // name and date
                $string .= '<div class="col-lg-2">              
                                <h6 class="">'.$post->user->name.'</h6> <br>
                                <p>'.$post['created_at'].'</p>
                            </div>';

                // text
                $string .= '<div class="col-lg-9">
                                <span class="category">'.$post['text'].'</span>
                            </div>';

                $string.='</div>
                </div>
              </div>';
            }
        }

        // $string = gettype($posts);

        return $string;
    }
}

?>
