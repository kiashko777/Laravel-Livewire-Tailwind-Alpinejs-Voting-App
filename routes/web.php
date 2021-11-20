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

//ROUTE TO RENDER MAIN PAGE

Route::get('/', function () {
  return view('index');
});

//ROUTE TO RENDER SINGLE PAGE

Route::view('/idea', 'show');







require __DIR__ . '/auth.php';
