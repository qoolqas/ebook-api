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
Route::get('/me', function () {
    return ["nis" =>"3103118113", "name" => "Raveendra Al Kautsar","gender" => "Laki Laki","phone" => "089528281919","class" => "XI RPL 4"];
});
