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
    return view('upload.index');
})->name('upload.index');

Route::post('upload', function (){
    request()->validate([
        'excel_file' => ['required', 'mimes:xlx,xls,csv', 'max:40000']
    ]);

    return array_map('str_getcsv', file(request()->excel_file));

})->name('upload.post');
