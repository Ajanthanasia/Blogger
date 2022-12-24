<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\CheckLoginController;
use App\Http\Controllers\AjexLikeController;
use App\Http\Controllers\AjaxDislikeController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home.index');
});

Route::resource('home',HomeController::class)->only(['index']);

Route::resources([
    'user' => LoginController::class,
    'profile' => UserController::class,
    'password' =>PasswordController::class,
    'post' => PostController::class,
    'like' => LikeController::class,
]);

Route::resource('check',CheckLoginController::class)->only(['store']);

Route::resource('ajaxlike',AjexLikeController::class);

Route::resource('ajax_dislike',AjaxDislikeController::class);

Route::resource('admin_post',AdminPostController::class);

Route::resource('admin_users',AdminUsersController::class);

// Route::get('/admin_users_view,',function() {
//     return new UserResource(User::all());
// });


// Route::post('/post/update/{post}', [PostController::class, 'update'])->name('post.update');
// Route::get('/post/destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');

// Route::get('/post/{post}/like', [LikeController::class, 'store'])->name('like.store');
// Route::get('/post/{post}/dislike', [LikeController::class, 'destroy'])->name('like.destroy');

// Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');

// Route::get('/user/index', [LoginController::class, 'index'])->name('user.index');
// Route::get('/user/create', [LoginController::class, 'create'])->name('user.create');
// Route::post('/user/store', [LoginController::class, 'store'])->name('user.store');
// Route::post('/user/show', [LoginController::class, 'show'])->name('user.show');

// Route::get('/profile', [UserController::class, 'index'])->name('profile.index');
// Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit');
// Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');
// Route::get('/profile/destroy', [UserController::class, 'destroy'])->name('profile.destroy');

// Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
// Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');

// Route::get('/start', [HomeController::class, 'index'])->name('start');
// // Route::get('/home/create/{post}', [HomeController::class, 'create'])->name('home.create');
// // Route::get('/home/store/{post}', [HomeController::class, 'store'])->name('home.store');

// Route::get('/post', [PostController::class, 'index'])->name('posts');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
// Route::get('/post/show/{post}', [PostController::class, 'show'])->name('post.show');
// Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('post.edit');
// Route::post('/post/update/{post}', [PostController::class, 'update'])->name('post.update');
// Route::get('/post/destroy/{post}', [PostController::class, 'destroy'])->name('post.destroy');

// Route::get('/post/{post}/like', [LikeController::class, 'store'])->name('post.like.store');
// Route::get('/post/{post}/dislike', [LikeController::class, 'destroy'])->name('post.dislike.destroy');
