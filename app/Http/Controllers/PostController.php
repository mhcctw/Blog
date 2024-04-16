<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Contracts\PostService;
use App\Services\PostServiceDefault;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
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
        

        return view('profile.profile', ['user' => $user, 'posts' => $ShowPosts, 'userAuth' => $user]);


    }// end method UpdatePost
    
}
