<?php
use Illuminate\Support\Facades\Route;
use Modules\Menu\Http\Controllers\MainmenuController;
use Modules\Menu\Http\Controllers\SubmenuController;

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

Route::prefix('mainmenus')->group(function () {
    Route::middleware(['auth', 'admin', 'blacklist'])->group(function () {

        Route::name('mainmenu.')->group(function () {
            Route::controller(MainmenuController::class)->group(function () {
                Route::get('/menus', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{menu}/edit', 'edit')->name('edit');
                Route::put('/{menu}', 'update')->name('update');
                Route::delete('/{menu}', 'destroy')->name('destroy');

                Route::put('/{menu}/{status}', 'status')->name('status');
            });
        });

    });
});

Route::prefix('submenus')->group(function () {
    Route::middleware(['auth', 'admin', 'blacklist'])->group(function () {

        Route::name('submenu.')->group(function () {
            Route::controller(SubmenuController::class)->group(function () {
                Route::get('/submenus', 'index')->name('index');
                Route::get('/submenus/create', 'create')->name('create');
                Route::post('/submenus', 'store')->name('store');
                Route::get('/submenus/{submenu}/edit', 'edit')->name('edit');
                Route::put('/update/submenus/{submenu}', 'update')->name('update');
                Route::delete('/submenus/{submenu}', 'destroy')->name('destroy');

                Route::put('/submenus/{submenu}/{status}', 'status')->name('status');
            });
        });

    });
});
