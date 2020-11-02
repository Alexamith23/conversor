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
    return view('inicio');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/descargas', [App\Http\Controllers\HomeController::class, 'descargas'])->name('descargas');
Route::get('/descargas/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');
Route::post('/convertir', [App\Http\Controllers\HomeController::class, 'convertir'])->name('convertir');



// Rutas para los archivos
Route::get('/descargar', function () {
    return view('descargar');
});

Route::post('/media', function () {
    
    request()->file->storeAs('uploads', request()->file->getClientOriginalName());
    $ruta_donde_se_almaceno_el_archivo = request()->file->getClientOriginalName();
    return view('descargar',['archivo' => $ruta_donde_se_almaceno_el_archivo]);
});

Route::get('/download/{file}', function ($file) {
    return Storage::download("uploads/$file");
});