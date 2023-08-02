<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TbJenisObatController;
use App\Http\Controllers\TbObatController;
use App\Http\Controllers\TbUserController;
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


Route::group(
    [
        'middleware' => 'guest',
    ],
    function () {
        Route::get('login', [LoginController::class, 'index'])->name('login');
        Route::post('login', [LoginController::class, 'authenticate'])->name('login');
        Route::get('register', [RegisterController::class, 'index'])->name('register');
        Route::post('register', [RegisterController::class, 'store'])->name('register');
    }
);

Route::group(
    [
        'middleware' => ['auth', 'active.user']
    ],
    function () {
        Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::resource('user', TbUserController::class);
        Route::resource('jenis-obat', TbJenisObatController::class);
        Route::resource('obat', TbObatController::class);
    }
);
