<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 

Route::prefix('user')->group(function () {

    Route::get('/showposts',[App\Http\Controllers\HomeController::class, 'showpost'])->name('user.view.posts');
    Route::get('/show/post/{id}',[App\Http\Controllers\HomeController::class, 'spost'])->name('user.view.post');
    
});



Route::prefix('admin')->group(function () {

    Route::post('/logout',[App\Http\Controllers\Auth\LoginAdminController::class,'logout'])->name('admin.logout');
    Route::get('/',[App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/login',[App\Http\Controllers\Auth\LoginAdminController::class,'showloginform'])->name('admin.login');
    Route::post('/login',[App\Http\Controllers\Auth\LoginAdminController::class,'login'])->name('admin.login.submit');
    Route::get('post/upload',[App\Http\Controllers\AdminController::class,'listforuploadposts'])->name('admin.post.upload');
    Route::get('/post/{id}/upload',[App\Http\Controllers\AdminController::class,'postupload'])->name('admin.upload.post');
});
 

//  /post/'.$post->id.'/upload
Route::prefix('writer')->group(function () {

    Route::get('/',[App\Http\Controllers\WriterController::class, 'index'])->name('writer.dashboard');
    Route::get('/login',[App\Http\Controllers\Auth\LoginWriterController::class,'showloginform'])->name('writer.login');
    Route::post('/login',[App\Http\Controllers\Auth\LoginWriterController::class,'login'])->name('writer.login.submit');
    Route::put('/create_post/{id}',[App\Http\Controllers\WriterController::class,'addpost'])->name('writer.create_post.submit'); 
    Route::get('/showposts',[App\Http\Controllers\WriterController::class,'showaAllPosts'])->name('writer.show.posts');
    Route::get('/post/{id}/edit',[App\Http\Controllers\WriterController::class,'selectPost'])->name('writer.edit.post');
    Route::put('/post/edit/{id}',[App\Http\Controllers\WriterController::class,'postEdit'])->name('writer.editpost');
    Route::post('/logout',[App\Http\Controllers\Auth\LoginWriterController::class,'logout'])->name('writer.logout');
});

