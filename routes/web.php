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

// Route::post('/convertir', function () {
//     $msg = "This is a simple message.";
//     return view('home',['respuesta'=>$msg]); 
//     // response()->json(array('msg'=> $msg), 200);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/descargas', [App\Http\Controllers\HomeController::class, 'descargas'])->name('descargas');

Route::post('/convertir', [App\Http\Controllers\HomeController::class, 'convertir'])->name('convertir');
