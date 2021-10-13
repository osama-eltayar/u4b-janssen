<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
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

Route::redirect('/','register');


Route::get('register',[RegisterController::class, 'showRegisterForm'])->middleware('guest')->name('register');
Route::post('register',[RegisterController::class, 'register'])->middleware('guest');

Route::resource('images',ImageController::class)->only('create','store')->middleware('auth');
Route::get('users/export',[UserController::class,'export'])->name('users.export');

Route::view('count-down','auth.count-down')->name('count-down')->middleware('auth');

Route::get('/uploads/{path}',[UploadController::class,'show'])->name('uploads.show')->where('path','.*');
Route::get('/downloads/{path}',[UploadController::class,'download'])->name('uploads.download')->where('path','.*');

Route::resource('games', GameController::class)->only('create','store','update');
Route::get('games/export', [GameController::class,'export'])->name('games.export');

Route::view('export','export');

Route::get('migrate',function (){
    \App\Models\User::query()->truncate();
    \App\Models\Image::query()->truncate();
   \Illuminate\Support\Facades\Artisan::call('migrate --seed');
   return response('done');
});

Route::get('clear-cache',function (){
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache is cleared";
});

Route::get('seed/countries',function(){
   \App\Models\Country::query()->truncate();
    $countries = ['GCC', 'South Africa', 'JENA', 'TURKEY', 'NEMA', 'RUSSIA',];

    foreach ($countries as $country)
        \App\Models\Country::firstOrCreate(['name' => $country]);
});

//Route::get('reset-game',function (){
//   \App\Models\Game::query()->truncate();
//   return "done";
//});

Route::get('games',function (){
   return \App\Models\Game::query()->with('country')->get()->toArray();
});

