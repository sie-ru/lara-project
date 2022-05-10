<?php
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Post\CreatePostController;
use App\Http\Controllers\Post\DeletePostController;
use App\Http\Controllers\Post\EditPostController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\User\EditUserController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/post/show/{post_id}', [PostController::class, '__invoke'])->name('post');

Route::prefix('auth')->group(function() {
    Route::get('/login', [LoginController::class, '__invoke'])->name('auth_login');
    Route::get('/register', [RegisterController::class, '__invoke'])->name('auth_reg');
    Route::get('/logout', [LoginController::class, 'logout'])->name('auth_logout_process');
    Route::post('/login/process', [LoginController::class, 'login'])->name('auth_login_process');
    Route::post('/register/process', [RegisterController::class, 'registration'])->name('auth_reg_process');
});

Route::prefix('user')->middleware('auth')->group(function() {
    Route::get('/profile/{user_id}', [UserController::class, '__invoke'])->name('user_profile');
    Route::get('/profile/{user_id}/edit', [EditUserController::class, '__invoke'])->name('user_edit_profile');
    Route::post('/profile/{user_id}/edit/process', [EditUserController::class, 'updateUserData'])->name('user_edit_profile_process');
});

Route::prefix('/post')->middleware('auth')->group(function() {
    Route::get('/create', [CreatePostController::class, '__invoke'])->name('post_create');
    Route::get('/{post_id}/edit', [EditPostController::class, '__invoke'])->name('post_edit');
    Route::post('/create/process', [CreatePostController::class, 'upload'])->name('post_create_process');
    Route::delete('/{post_id}/delete/process', [DeletePostController::class, '__invoke'])->name('post_delete_process');
    Route::put('/{post_id}/edit/process', [EditPostController::class, 'edit'])->name('post_edit_process');
});

Route::prefix('comment')->middleware('auth')->group(function() {
    Route::post('/{post_id}/add', [CommentController::class, '__invoke'])->name('comment_add');
});

Route::prefix('author')->group(function() {
    Route::get('/{author_id}', [AuthorController::class, '__invoke'])->name('author');
});

Route::prefix('feed')->group(function() {
    Route::get('/all', [FeedController::class, '__invoke'])->name('feed');
    Route::get('/search', [FeedController::class, 'searchByQuery'])->name('search');
    Route::get('/bytag/{tag}', [FeedController::class, 'searchByTag'])->name('search_by_tag');
});


