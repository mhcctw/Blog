<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Contracts\LikeService;
use App\Contracts\PostService;
use App\Services\PostServiceDefault;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postService;
    protected $likeService;

    public function __construct(PostService $postService, LikeService $likeService)
    {
        $this->postService = $postService;
        $this->likeService = $likeService;
    }
    
    public function createPost(Request $request){
        $inputFields = $request->validate([
            'text' => 'required'
        ]);

        $user = Auth::user();

        $inputFields['text'] = strip_tags($inputFields['text']);
        $inputFields['user_id'] = auth()->id();

        Post::create($inputFields);
        $posts = $user->UsersPosts;
        
        $result = $this->postService->ShowPosts($posts, $user);

        return response()->json(['posts' => $result]);

    }// end method createPost

    public function deletePost(Post $post){

        if(auth()->user()->id === $post['user_id']){
            $post->delete();
        }

        return redirect()->back();
    }// end method deletePost

    public function ShowEditPost(Post $post){

        if(auth()->user()->id !== $post['user_id']){
            return redirect()->back();
        }

        return view('editPost', ['post' => $post]);

    }// end method ShowEditPost

    public function UpdatePost(Post $post, Request $request){
        
        if(auth()->user()->id !== $post['user_id']){
            return redirect()->back();
        }

        $inputFields = $request->validate([
            'text' => 'required'
        ]);

        $inputFields['text'] = strip_tags($inputFields['text']);

        $post->update($inputFields);

        $user = Auth::user();
        $posts = $user->UsersPosts;
        $ShowPosts = $this->postService->ShowPosts($posts, $user);
        

        return view('profile.profile', ['user' => $user, 'posts' => $ShowPosts]);


    }// end method UpdatePost
    

    // ____________________ LIKES

    public function likePost(Request $request){
        $inputFields = $request->validate([
            'post_id' => 'required|int'
        ]);

        $user = Auth::user();

        if($user){

            $post = Post::find($inputFields['post_id']);
                        
            $result = $this->likeService->AddLike($user, $post);

            return response()->json(['like' => $result]);

        }else{
            return view('login');
        }

        
    }
    public function unlikePost(Request $request){
        $inputFields = $request->validate([
            'post_id' => 'required|int'
        ]);

        $user = Auth::user();

        if($user){

            $post = Post::find($inputFields['post_id']);
                        
            $result = $this->likeService->RemoveLike($user, $post);

            return response()->json(['like' => $result]);

        }else{
            return view('login');
        }        
    }
    // ____________________ END OF LIKES
    
}
