<?php
use Illuminate\Support\Facades\Route;
use Modules\Auth\Http\Controllers\AuthController;

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

Route::prefix('auths')->group(function () {
    // Route::middleware(['admin', 'subadmin'])->group(function () {
    Route::name('auth.')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/signin', 'login')->name('login');
            Route::get('/signup', 'signup')->name('registration');

            Route::get('/load/forget/password', 'forgetpass')->name('forgetpass');
            Route::post('/load/check/account', 'checkAccount')->name('checkAccount');
            Route::post('/reset/password', 'resetpass')->name('resetpass');
            Route::post('/valid/login', 'validLogin')->name('logincheck');

            Route::post('/recover/password', 'resetPassWord')->name('resetPassWord');

            Route::get('/logout', 'logout')->name('logout');

            Route::get('/load/reset/password/{user}', 'loadResetPassword')->name('loadResetPassword');
        });
    });
    // });
});
