<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->middleware('auth')->name('home');

Route::controller(UsersController::class)->group(function(){
    Route::get('/login','login')->name('login');
    Route::post('/check','checklogin')->name('checklogin');
    Route::get('/register','register')->name('register');
    Route::post('/user/store','store')->name('store_user');
    Route::get('/logout','logout')->name('logout');
    Route::get('/user','index')->middleware('auth')->name('user');
});

Route::controller(PostController::class)->middleware('auth')->group(function(){
    Route::get('/list-posts','index')->name('list_posts');
    Route::get('/add-post','create')->name('create_post');
    Route::post('/store-post','store')->name('store_post');
    Route::get('/update-post/{post}','edit')->name('edit_post');
    Route::post('/save-post','update')->name('save_post');
    Route::match(['delete','get'],'/delete-post/{id}','destroy')->name('delete_post');
});
