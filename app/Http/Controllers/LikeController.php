<?php

namespace App\Http\Controllers;

use App\Contracts\LikeService;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    protected LikeService $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function likePost(Request $request): View|JsonResponse
    {
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
    public function unlikePost(Request $request): View|JsonResponse
    {
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
}
