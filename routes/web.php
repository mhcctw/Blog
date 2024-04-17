<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [UserController::class, 'index']);
Route::get('/', function(){
    return view('index');
});

Route::get('/search', [UserController::class, 'search']);

Route::get('/register', function(){
    return view('register');
});
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout']);
Route::get('/login', function(){
    return view('login');
});
Route::post('/login', [UserController::class, 'login'])->name('login');

//------ USER
Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}', [UserController::class, 'profile']);

    Route::get('/editProfile', [UserController::class, 'edit']);
    Route::post('/editProfile', [UserController::class, 'saveEditProfile']);

    Route::get('/changePassword', function(){
        return view('profile.password_change');
    });
    Route::post('/changePassword', [UserController::class, 'changePassword']);

    // -----POSTS
    Route::post('/sendPost', [PostController::class, 'createPost'])->name('sendPost');
    Route::post('/deletePost/{post}', [PostController::class, 'deletePost']);
    Route::get('/editPost/{post}', [PostController::class, 'ShowEditPost']);
    Route::put('/updatePost/{post}', [PostController::class, 'UpdatePost'])->name('updatePost');
    
});

