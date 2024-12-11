<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

// Auth Routes (Menggunakan Sanctum untuk login dan logout)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// User Routes (Tanpa autentikasi)
Route::get('/me', [UserController::class, 'getCurrentUser'])->middleware('auth:sanctum');
Route::get('/users/search', [UserController::class, 'searchUser']);
Route::get('/users/{id}', [UserController::class, 'getUserProfile']);

// Follow Routes (Menggunakan token untuk follow dan unfollow)
Route::post('/users/{id}/follow', [FollowController::class, 'follow'])->middleware('auth:sanctum');
Route::delete('/users/{id}/unfollow', [FollowController::class, 'unfollow'])->middleware('auth:sanctum');
Route::get('/users/{id}/followers', [FollowController::class, 'getFollowers']);
Route::get('/users/{id}/following', [FollowController::class, 'getFollowing']);

// Post Routes (Menggunakan token untuk membuat post, like, dan delete post)
Route::post('/posts', [PostController::class, 'createPost'])->middleware('auth:sanctum');
Route::get('/posts', [PostController::class, 'getAllPosts']);
Route::get('/users/{id}/posts', [PostController::class, 'getUserPosts']);
Route::get('/posts/{id}', [PostController::class, 'getPost']);
Route::delete('/posts/{id}', [PostController::class, 'deletePost'])->middleware('auth:sanctum');

// Like Routes (Menggunakan token untuk like dan unlike)
Route::post('/posts/{id}/like', [LikeController::class, 'likePost'])->middleware('auth:sanctum');
Route::delete('/posts/{id}/unlike', [LikeController::class, 'unlikePost'])->middleware('auth:sanctum');

// Comment Routes (Menggunakan token untuk menambah dan menghapus komentar)
Route::post('/posts/{id}/comments', [CommentController::class, 'addComment'])->middleware('auth:sanctum');
Route::get('/posts/{id}/comments', [CommentController::class, 'getComments']);
Route::delete('/comments/{id}', [CommentController::class, 'deleteComment'])->middleware('auth:sanctum');
