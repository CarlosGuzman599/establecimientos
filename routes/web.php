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

Route::middleware(['auth'])->group(function () {
    /*
    Route::post('/establecimiento/store', [App\Http\Controllers\EstablecimientoController::class, 'store'])->name('establecimiento.store');
    Route::get('/establecimiento/create', [App\Http\Controllers\EstablecimientoController::class, 'create'])->name('establecimiento.create');
    Route::delete('/establecimiento/destroy/{establecimiento}', [App\Http\Controllers\EstablecimientoController::class, 'destroy'])->name('establecimiento.destroy');
    Route::get('/establecimiento/edit/{establecimiento}', [App\Http\Controllers\EstablecimientoController::class, 'edit'])->name('establecimiento.edit');
    Route::get('/establecimiento/show/{establecimiento}', [App\Http\Controllers\EstablecimientoController::class, 'show'])->name('establecimiento.show');
    Route::put('/establecimiento/update/{id}', [App\Http\Controllers\EstablecimientoController::class, 'update'])->name('establecimiento.update');
    Route::get('/establecimiento/index', [App\Http\Controllers\EstablecimientoController::class, 'index'])->name('establecimiento.index');

    //ANUNCIOS
    Route::get('/anuncio_establecimiento/create/{id}', [App\Http\Controllers\AnunciosController::class, 'anuncio_establecimiento_create'])->name('anuncio_establecimiento.create');
    Route::post('/anuncio_establecimiento/store', [App\Http\Controllers\AnunciosController::class, 'store'])->name('anuncio_establecimiento.store');
    Route::get('/anuncio_establecimiento/edit/{anuncio}', [App\Http\Controllers\AnunciosController::class, 'edit'])->name('anuncio_establecimiento.edit');
    Route::put('/anuncio_establecimiento/update/{id}', [App\Http\Controllers\AnunciosController::class, 'update'])->name('anuncio_establecimiento.update');
    Route::delete('/anuncio_establecimiento/destroy/{anuncio}', [App\Http\Controllers\AnunciosController::class, 'destroy'])->name('anuncio_establecimiento.destroy');
    */
    Route::get('/admin/users/index',[\App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
});