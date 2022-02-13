<?php

use App\Http\Controllers\ExcelUpload;
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

Route::get('/', [ExcelUpload::class, 'index'])->name('upload.index');
Route::post('upload', [ExcelUpload::class, 'store'])->name('upload.store');

