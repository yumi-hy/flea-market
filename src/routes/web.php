<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;

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

Route::get('/', [ItemController::class, 'index'])->name('index');

Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login.post');

Route::middleware(['auth'])->group(function () {
    Route::get('/mypage/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/mypage/profile', [UserController::class, 'update'])->name('profile.update')->middleware('auth');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});

Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage')->middleware('auth');

Route::get('/sell', [ItemController::class, 'create'])->name('items.create');
Route::post('/sell', [ItemController::class, 'store'])->name('items.store');

Route::get('/item/{id}', [ItemController::class, 'show'])->name('item.show');

Route::get('/item/purchase/{id}', [ItemController::class, 'purchase'])->name('item.purchase');