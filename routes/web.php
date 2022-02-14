<?php

use App\Http\Controllers\PasteBinController;
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
    return view('home');
});

Route::post('/submit-pastebin', [PasteBinController::class, 'store'])->name('submit-pastebin');
Route::get('/submit-pastebin/success/{uuid}', [PasteBinController::class, 'storeSuccess'])->name('submit-pastebin.success');
Route::get('/paste/{uuid}', [PasteBinController::class, 'show'])->name('paste.show');


Route::get('/success', function () {
    return view('success');
});
