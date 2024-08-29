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
        $this->postService = $mainPageContentService;
    }

    public function MainPage(){

        // $posts = $this->mainPageContentService->GetContent();
        return view('index');
    }
}
