<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','IsAdmin'])->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('home_admin');
    Route::get('Users',[AdminController::class,'users'])->name('admin.users')->middleware('permission:menu.admin');
    Route::get('Pagos',[AdminController::class,'pagos'])->name('admin.pagos')->middleware('permission:menu.admin');
    Route::get('sorteos_index',[AdminController::class,'iniciar_sorteo'])->name('admin.iniciar_sorteo')->middleware('permission:menu.admin');
    Route::get('sorteos_resultados',[AdminController::class,'sorteo_resultados'])->name('admin.sorteo_resultados')->middleware('permission:menu.admin');
    

    Route::get('sorteos_crear',[AdminController::class,'sorteo_crear'])->name('admin.sorteo_crear')->middleware('permission:menu.admin');
    Route::get('iniciar_sorteo/{sorteo}',[AdminController::class,'sorteo_jugar'])->name('admin.sorteo_jugar')->middleware('permission:menu.admin');


});