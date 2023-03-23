<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesContreller;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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



Route::resource('/blog',PostsController::class);
Route::resource('/profile',ProfileController::class);

Route::resource('/admin',AdminController::class);


Route::get('/',[PagesContreller::class, 'index']);
Route::get('/search',[PagesContreller::class, 'search']);


Route::get('/blog/liked/{id}',[PostsController::class, 'like']);
Route::get('/blog/Disliked/{id}',
function($id){

    $like = DB::table('likes')->where('post_id',$id)->first();
    if($like){
    DB::table('posts')->where('id',$id)->decrement('count');}

    DB::table('likes')->where('post_id',$id)->where('user_id',Auth::user()->id)->delete();
    return back()->with('dislike' ,'You dont like this post');


});

Route::get('/admin/accepted/{postId}',[AdminController::class, 'acceptPost']);



Route::post('/blog/comments',[CommentController::class, 'store']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
