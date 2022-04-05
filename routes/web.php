<?php

use App\Http\Controllers\ShortLinkContorller;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ShortLinkContorller::class, 'index']);
Route::post('/', [ShortLinkContorller::class, 'link']);
Route::get('/{shortlink}', [ShortLinkContorller::class, 'shorter'])->name('shortlink');

Auth::routes();
