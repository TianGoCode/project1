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
//posts
Route::get('/create', [App\Http\Controllers\PostController::class, 'create'])->middleware('auth');
Route::post('/create',[App\Http\Controllers\PostController::class, 'store']);
Route::get('/show/{id}',[App\Http\Controllers\PostController::class, 'show']);

//admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/approve',[App\Http\Controllers\AdminController::class, 'approve']);
Route::get('/admin/topic',[App\Http\Controllers\AdminController::class, 'createTopic']);
Route::get('/admin/users',[App\Http\Controllers\AdminController::class, 'users']);
//admin/crud topic
Route::post('/create_category',[App\Http\Controllers\AdminController::class, 'createNewCat']);
Route::post('/edit_category',[App\Http\Controllers\AdminController::class, 'editCat']);
Route::post('/delete_category',[App\Http\Controllers\AdminController::class, 'deleteCat']);
//admin/post
Route::post('/approve',[App\Http\Controllers\AdminController::class, 'acceptPost']);
