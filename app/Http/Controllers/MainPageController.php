<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Contracts\PostService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Contracts\MainPageContentService;

class MainPageController extends Controller
{
    protected $postService;
    protected $mainPageContentService;

    public function __construct(PostService $postService, MainPageContentService $mainPageContentService)
    {
        $this->postService = $postService;
        $this->mainPageContentService = $mainPageContentService;
    }

    public function MainPage(){

        $posts = $this->mainPageContentService->GetContent();
        $htmlPosts = $this->postService->ShowPosts($posts);

        if(Auth::user()){ 

            $header = 'Your Feed:';

            return view('index', ['posts' => $htmlPosts, 'header' => $header]);
            
        }else{

            $header = 'Most Popular Blabs:';

            return view('index', ['posts' => $htmlPosts, 'header' => $header]);
        }

        
    }
}
