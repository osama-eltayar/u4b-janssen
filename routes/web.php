<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
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


Route::get('register',[RegisterController::class, 'showRegisterForm'])->middleware('guest')->name('register');
Route::post('register',[RegisterController::class, 'register'])->middleware('guest');

Route::resource('images',ImageController::class)->only('create','store')->middleware('auth');
Route::get('users/export',[UserController::class,'export'])->name('users.export');

Route::get('/uploads/{path}',[UploadController::class,'show'])->name('uploads.show')->where('path','.*');
Route::get('/downloads/{path}',[UploadController::class,'download'])->name('uploads.download')->where('path','.*');
