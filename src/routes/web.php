<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware(['auth', 'check.profile'])->group(function () {
    Route::get('/', [UserController::class, 'index']
    )->name('index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/mypage/profile', [UserController::class, 'edit'])->name('Profile.edit');
    Route::post('/mypage/profile', [UserController::class, 'update'])->name('profile.update');
});