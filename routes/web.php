<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ZenBlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubCategoryController;

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

Route::get('/',[ZenBlogController::class,'index'])->name('home');

Route::get('/about',[ZenBlogController::class,'about'])->name('about');
Route::get('/contact',[ZenBlogController::class,'contact'])->name('contact');
Route::get('/blog-category/{catId}',[ZenBlogController::class,'category'])->name('blog.category');

Route::get('/user-register',[ZenBlogController::class, 'userRegister'])->name('user.register');
Route::post('/user-register',[ZenBlogController::class, 'saveUser'])->name('user.register');
Route::get('/user-login',[ZenBlogController::class, 'loginUser'])->name('user.login');
Route::post('/user-login',[ZenBlogController::class, 'checkLogin'])->name('user.login');
Route::get('/user-logout',[ZenBlogController::class, 'logout'])->name('user.logout');


Route::group(['middleware'=>'blogUser'],function(){
    Route::get('/blog-details/{slug}',[ZenBlogController::class,'blog'])->name('blog.details');
    Route::post('/new-comment',[CommentController::class, 'saveComment'])->name('new.comment');

});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::post('/new-category',[CategoryController::class,'saveCategory'])->name('new.category');

    Route::get('/sub-category',[SubCategoryController::class,'index'])->name('sub.category');

    Route::get('/author',[AuthorController::class,'index'])->name('author');
    Route::post('/new-author',[AuthorController::class,'saveAuthor'])->name('new.author');

    Route::get('/add-blog',[BlogController::class,'index'])->name('add.blog');
    Route::get('/manage-blog',[BlogController::class,'manageBlog'])->name('manage.blog');
    Route::post('/new-blog',[BlogController::class,'saveBlog'])->name('new.blog');
    Route::get('/status/{id}',[BlogController::class,'status'])->name('status');
    Route::post('/blog-delete',[BlogController::class,'blogDelete'])->name('blog.delete');
});
