<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','IsAdmin'])->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('home_admin')->middleware('permission:menu.admin');
    Route::get('Users',[AdminController::class,'users'])->name('admin.users')->middleware('permission:menu.adminAll');
    Route::get('Pagos',[AdminController::class,'pagos'])->name('admin.pagos')->middleware('permission:menu.adminAll');
    Route::get('Reporte_pagos_ganadores',[AdminController::class,'reporte_pagos_ganadores'])->name('admin.reporte_pagos_ganadores')->middleware('permission:menu.adminAll');
    Route::get('sorteos_index',[AdminController::class,'iniciar_sorteo'])->name('admin.iniciar_sorteo')->middleware('permission:menu.admin');
    Route::get('sorteos_resultados',[AdminController::class,'sorteo_resultados'])->name('admin.sorteo_resultados')->middleware('permission:menu.admin');
    Route::get('Configuracion',[AdminController::class,'configuracion'])->name('admin.configuracion')->middleware('permission:menu.admin');

    Route::get('Usuarios_referidos',[AdminController::class,'usuarios_referidos'])->name('admin.usuarios_referidos')->middleware('permission:menu.admin');
    Route::get('Premiar',[AdminController::class,'premiar'])->name('admin.premiar')->middleware('permission:menu.admin');

    Route::get('sorteos_crear',[AdminController::class,'sorteo_crear'])->name('admin.sorteo_crear')->middleware('permission:menu.admin');
    Route::get('iniciar_sorteo/{sorteo}',[AdminController::class,'sorteo_jugar'])->name('admin.sorteo_jugar')->middleware('permission:menu.admin');
    Route::get('sorteos_user',[AdminController::class,'sorteo_carton_user'])->name('admin.sorteo_carton_user')->middleware('permission:menu.admin');


});