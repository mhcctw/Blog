<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\PostService;
use Illuminate\Support\Facades\Auth;
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

        if(Auth::user()){

            $posts = $this->mainPageContentService->GetContent();

            $htmlPosts = $this->postService->ShowPosts($posts);

            $header = 'Your Feed:';

            return view('index', ['posts' => $htmlPosts, 'header' => $header]);
            
        }else{
            return view('index', ['posts' => '']);
        }

        
    }
}
