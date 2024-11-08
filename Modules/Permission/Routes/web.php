<?php
use Illuminate\Support\Facades\Route;
use Modules\Permission\Http\Controllers\RoleController;

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

Route::prefix('roles')->group(function () {
    Route::middleware(['auth', 'superAdmin', 'blacklist'])->group(function () {

        Route::name('role.')->group(function () {
            Route::controller(RoleController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{role}', 'show')->name('show');
                Route::get('/{role}/edit', 'edit')->name('edit');
                Route::put('/{role}', 'update')->name('update');
                Route::delete('/{role}', 'destroy')->name('destroy');

            });
        });
    });

});
