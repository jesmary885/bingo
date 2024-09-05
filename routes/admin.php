<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','IsAdmin'])->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('home_admin');
    Route::get('Users',[AdminController::class,'users'])->name('admin.users')->middleware('permission:menu.admin');
    Route::get('sorteos_index',[AdminController::class,'iniciar_sorteo'])->name('admin.iniciar_sorteo')->middleware('permission:menu.admin');
    Route::get('iniciar_sorteo/{sorteo}',[AdminController::class,'sorteo_jugar'])->name('admin.sorteo_jugar')->middleware('permission:menu.admin');


});