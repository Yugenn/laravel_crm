<?php

use App\Http\Controllers\ZipController;
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
Route::get('zips/dod', [App\Http\Controllers\ZipController::class,'form'])->name('zips.form');

Route::resource('zips', App\Http\Controllers\ZipController::class);

