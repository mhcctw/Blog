<?php

namespace App\Services;

use App\Models\User;
use App\Contracts\PostService;
use Illuminate\Support\Facades\Auth;

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
                $string.='<div class="col-lg-12 col-md-6" style="margin-bottom:60px;">
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
                $string .= '<div class="col-lg-8">
                                <span class="category">'.$post['text'].'</span>
                            </div>';

                // stars
                $string .= '<div class="col-lg-1 text-center">
                                <span class="category">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                                        </svg>
                                    </a>
                                </span>
                            </div>';

                $string.='</div>
                        </div> ';


                // Edit and Delete
                $userAuth = Auth::user();

                if($user['id']==$userAuth->id){
                    
                    $string.='<div style = "padding:0 40px;">
                                <div class = "row">
                                    <div class = "col-1 text-center">
                                        <a href = "/editPost/'. $post['id'] .'"> Edit </a>
                                    </div>
                                    <div class = "col-1 text-center">
                                        |
                                    </div>

                                    <div class = "col-1 text-center">                                    
                                        <form method = "POST" action = "/deletePost/'. $post['id'] .'"> 
                                            '.csrf_field().'                                  
                                            <button type = "submit" style="padding: 0;
                                                border: none;
                                                font: inherit;
                                                color: #007aff; 
                                                background-color: transparent;"> Delete </button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                }

                
                                   
                $string.='</div>';
            }
        }

        return html_entity_decode($string);
    }
}

?>
