<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\cartones;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShoppingCartController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/auth/redirect', [AuthController::class,'redirect'])->name('auth.redirect');
 
Route::get('/auth/callback', [AuthController::class,'callback'])->name('auth.callback');

Route::middleware(['auth'])->group(function()
{

    Route::get('/home', HomeController::class)->name('home');

    Route::get('cartones/{sorteo}', [cartones::class,'index'])->name('cartones.index');

    Route::get('shopping-cart', [ShoppingCartController::class,'index'])->name('shopping-cart');

    Route::get('mis-cartones', [ShoppingCartController::class,'cartones'])->name('mis-cartones');

});
