<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardFileUnitController;
use App\Http\Controllers\DashboardLetterController;
use App\Http\Controllers\DashboardProfilUserController;
use App\Http\Controllers\DashboardUnitController;
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

// route Auth user
Route::middleware('auth')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index');
        // Route::get('/about', 'about');
        // Route::get('/contac', 'contac');
    });
    Route::post('/logout', [LoginController::class, 'logout']);

    Route::middleware('admin')->group(function () {
        // Route User

        Route::controller(DashboardUserController::class)->group(function () {
            Route::post('/dashboard/users/file-import', 'fileImport');
            Route::get(
                '/dashboard/users/file-import-create',
                'fileImportCreate'
            );
            Route::put(
                '/dashboard/user/changepassword/{user} ',
                'changepassword'
            );
            Route::resource('/dashboard/user', DashboardUserController::class);
        });

        // route Profil
        route::resource(
            '/dashboard/users/profilUser',
            DashboardProfilUserController::class
        )->only('index', 'update');
        // end Route Profil

        // End Route User

        // unit
        route::resource('/dashboard/units', DashboardUnitController::class);

        Route::controller(DashboardUnitController::class)->group(function () {
            Route::get(
                '/dashboard/unit/file-import-create',
                'fileImportCreate'
            );
            Route::get('/dashboard/unit/checkSlug', 'checkSlug');
            Route::get('/dashboard/unit/getType', 'gettype');
            Route::post('/dashboard/unit/file-import', 'fileImport');
        });

        // endUnit

        // letter
        Route::controller(DashboardLetterController::class)->group(function () {
            Route::get('/dashboard/unit/letter/data/{categoryletters}', 'data');
            Route::get('/dashboard/unit/letter/edittax/{letter}', 'edittax');
            Route::put('/dashboard/unit/letter/taxstore/{letter}', 'taxstore');
            Route::get(
                '/dashboard/unit/letter/editexpire/{letter}',
                'editexpire'
            );
            Route::put(
                '/dashboard/unit/letter/expirestore/{letter}',
                'expirestore'
            );
        });
        Route::resource(
            '/dashboard/unit/letter',
            DashboardLetterController::class
        );

        // endletter
        Route::get('/dashboard/unit/files/cekSlug', [
            DashboardFileUnitController::class,
            'cekSlug',
        ]);

        Route::resource(
            'dashboard/unit/fileUnit',
            DashboardFileUnitController::class
        );
    });
});
// end Auth User

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
        Route::post('/login', 'authenticate');
    });
});
