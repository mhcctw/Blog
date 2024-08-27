<?php

namespace App\Services;

use App\Models\User;
use App\Contracts\PostService;
use Illuminate\Support\Facades\Auth;
use App\Contracts\LikeService;

// draw posts on the profile

class PostServiceDefault implements PostService
{
    protected $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function ShowPosts(Object $posts, User $user){
        if(count($posts)==0){

            if($user->id==Auth::user()->id){
                $string = '<div class="col-lg-12 text-center">
                            <div class="section-heading">          
                            <h2>You don\'t have any posts yet</h2>
                            </div>
                        </div>';
            }else{
                $string = '<div class="col-lg-12 text-center">
                            <div class="section-heading">          
                            <h2>'. $user->name .' didn\'t post anything yet</h2>
                            </div>
                        </div>';
            }          


        }else{

            if($user->id==Auth::user()->id){
                $string = '<div class="col-lg-12 text-center">
                            <div class="section-heading">          
                            <h2>Your posts:</h2>
                            </div>
                        </div>';
            }else{
                $string = '<div class="col-lg-12 text-center">
                            <div class="section-heading">          
                            <h2>'. $user->name .'\'s posts:</h2>
                            </div>
                        </div>';
            }
            
            

            foreach ($posts as $post){
                $string.='<div class="col-lg-12 col-md-12" style="margin-bottom:60px;">
                            <div class="item">
                                <div class="row">';

                // user's avatar                
                $string .= '<div class="col-lg-1">
                                <img style="border-radius:50%; max-width:100px;" src="'.(!empty($user['photo']) ? url('assets/images/avatars/'.$post->user->photo) : url('assets/images/no_image.png')).'" alt="avatar">
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
                                <span class="category" id="category-'.$post['id'].'">';
                
                                // like Service (Redis)
                $string .= $this->likeService->ShowLike(Auth::user(), $post);
                    
                $string .='</span>
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
