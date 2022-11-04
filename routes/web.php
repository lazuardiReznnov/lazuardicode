<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProfilUserController;
use App\Http\Controllers\DashboardUserController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index');
        // Route::get('/about', 'about');
        // Route::get('/contac', 'contac');
    });
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::middleware('admin')->group(function () {
        // Route User
        Route::resource(
            '/dashboard/user',
            DashboardUserController::class
        )->except('show');
        Route::post('/dashboard/users/file-import', [
            DashboardUserController::class,
            'fileImport',
        ]);

        Route::get('/dashboard/users/file-import-create', [
            DashboardUserController::class,
            'fileImportCreate',
        ]);
        // End Route User
        // route Profil
        route::resource(
            '/dashboard/users/profilUser',
            DashboardProfilUserController::class
        )->only('index', 'update');
        // end Route Profil
    });
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});
