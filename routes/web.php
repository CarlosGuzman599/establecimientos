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
    
    //ESTABLECIMIENTOS
    Route::get('/establecimiento/index', [App\Http\Controllers\EstablecimientoController::class, 'index'])->name('establecimiento.index');
    Route::post('/establecimiento/store', [App\Http\Controllers\EstablecimientoController::class, 'store'])->name('establecimiento.store');
    Route::get('/establecimiento/create', [App\Http\Controllers\EstablecimientoController::class, 'create'])->name('establecimiento.create');
    Route::get('/establecimiento/edit/{establecimiento}', [App\Http\Controllers\EstablecimientoController::class, 'edit'])->name('establecimiento.edit');
    Route::get('/establecimiento/show/{establecimiento}', [App\Http\Controllers\EstablecimientoController::class, 'show'])->name('establecimiento.show');
    Route::put('/establecimiento/update/{id}', [App\Http\Controllers\EstablecimientoController::class, 'update'])->name('establecimiento.update');

    //ANUNCIOS
    Route::get('/anuncio_establecimiento/index', [App\Http\Controllers\AnunciosController::class, 'index'])->name('anuncio_establecimiento.index');
    Route::get('/anuncio_establecimiento/create/{id}', [App\Http\Controllers\AnunciosController::class, 'anuncio_establecimiento_create'])->name('anuncio_establecimiento.create');
    Route::post('/anuncio_establecimiento/store', [App\Http\Controllers\AnunciosController::class, 'store'])->name('anuncio_establecimiento.store');
    Route::get('/anuncio_establecimiento/edit/{anuncio}', [App\Http\Controllers\AnunciosController::class, 'edit'])->name('anuncio_establecimiento.edit');
    Route::put('/anuncio_establecimiento/update/{id}', [App\Http\Controllers\AnunciosController::class, 'update'])->name('anuncio_establecimiento.update');
    
    //USUARIOS
    Route::get('/users/{id}',[\App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/edit/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/update/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/destroy/{id}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');



    Route::get('/admin/users/index',[\App\Http\Controllers\UserController::class, 'index'])->name('admin.users.index');
    //Route::get('/admin/establecimientos/index',[\App\Http\Controllers\EstablecimientoController::class, 'index'])->name('admin.establecimientos.index');


});
