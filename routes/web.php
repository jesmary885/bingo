<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BilleteraController;
use App\Http\Controllers\cartones;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JugarController;
use App\Http\Controllers\RegisterController;
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

Route::post('logout_out', [AuthController::class,'logout'])->name('logout_out');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
 
Route::get('/auth/callback', [AuthController::class,'callback'])->name('auth.callback');

Route::get('/registro', [RegisterController::class, 'index'])->name('Registro');
Route::post('/registro', [RegisterController::class, 'create'])->name('Registro_create');

Route::middleware(['auth'])->group(function()
{

    Route::get('/home', [HomeController::class,'index'])->name('home');

    Route::get('/cuentanos', [HomeController::class,'cuentanos'])->name('cuentanos');

    Route::get('cartones/{sorteo}', [cartones::class,'index'])->name('cartones.index');

    Route::get('shopping-cart', [ShoppingCartController::class,'index'])->name('shopping-cart');

    Route::get('mis-cartones', [ShoppingCartController::class,'cartones'])->name('mis-cartones');

    Route::get('jugar', [JugarController::class,'jugar'])->name('jugar');

    Route::get('resultados-sorteos', [JugarController::class,'resultados'])->name('resultados-sorteos');

    Route::get('mi_billetera', [BilleteraController::class,'index'])->name('billetera.index');

    Route::get('mis_cuentas', [BilleteraController::class,'cuentas'])->name('billetera.cuentas');

});
