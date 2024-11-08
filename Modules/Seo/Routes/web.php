<?php
use Illuminate\Support\Facades\Route;
use Modules\Seo\Http\Controllers\SeoController;

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

;

Route::prefix('seos')->group(function () {
    Route::middleware(['auth', 'subAdmin', 'blacklist'])->group(function () {
        Route::name('seo.')->group(function () {
            Route::controller(SeoController::class)->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{seo}/edit', 'edit')->name('edit');
                Route::put('/{seo}', 'update')->name('update');
                Route::delete('/{seo}', 'destroy')->name('destroy');
            });
        });
    });
});
