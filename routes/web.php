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

use \App\Http\Controllers\MainController;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::resource('/tags', '\App\Http\Controllers\TagController');
Route::resource('/items', '\App\Http\Controllers\ItemController');
Route::get('export-csv', function () {
    return Excel::download(new \App\Exports\UsersExport, 'data.csv');
});
