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
//     return Response::json(  
//         array(
//                 'user_id' => Auth::user()->id,
//                 'link' => request()->link,
//                 'format'=> request()->formato
//         ));
//     // dd(request()->all(), Auth::user()->id);
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/descargas', [App\Http\Controllers\HomeController::class, 'descargas'])->name('descargas');

Route::post('/convertir', [App\Http\Controllers\HomeController::class, 'convertir'])->name('convertir');
