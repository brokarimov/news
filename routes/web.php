<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LikeOrDislikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Category
Route::get('/category', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/category-create', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/create-category', [CategoryController::class, 'store'])->middleware('auth');
Route::delete('/category/{category}', [CategoryController::class, 'delete'])->middleware('auth');
Route::get('/category-update/{category}', [CategoryController::class, 'update_category'])->middleware('auth');
Route::put('/update/{category}', [CategoryController::class, 'update'])->middleware('auth');
Route::get('/category-search', [CategoryController::class, 'search'])->middleware('auth');
Route::post('/active/{active}', [CategoryController::class, 'active'])->middleware('auth');


// Post
Route::get('/posts', [PostController::class, 'index'])->middleware('auth');
Route::get('/post-create', [PostController::class, 'create'])->middleware('auth');
Route::post('/create-post', [PostController::class, 'store'])->middleware('auth');
Route::delete('/post/{post}', [PostController::class, 'delete'])->middleware('auth');
Route::get('/post-update/{post}', [PostController::class, 'update_post'])->middleware('auth');
Route::put('/update_post/{post}', [PostController::class, 'update'])->middleware('auth');
Route::get('/post-search', [PostController::class, 'search'])->middleware('auth');
Route::get('/findCategory/{category}', [PostController::class, 'getPostsByCategory'])->name('posts.by.category');


// Index Page
Route::get('/', [IndexController::class, 'index']);
Route::get('/batafsil/{post}', [IndexController::class, 'batafsil']);
Route::get('/post-search-index', [IndexController::class, 'search']);


// Login and Register


Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout']);

// Comments

Route::post('/createComment', [CommentController::class, 'createComment']);


// Likes
Route::post('/like', [LikeOrDislikeController::class, 'like'])->middleware('auth');
Route::post('/dislike', [LikeOrDislikeController::class, 'dislike'])->middleware('auth');

