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

    }
    
}
