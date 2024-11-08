<?php
use Illuminate\Support\Facades\Route;
use Modules\Post\Http\Controllers\DisplayController;
use Modules\Post\Http\Controllers\EpaperController;
use Modules\Post\Http\Controllers\PostController;

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

Route::prefix('posts')->group(function () {
    Route::middleware(['auth', 'subAdmin', 'blacklist'])->group(function () {

        Route::name('post.')->group(function () {
            Route::controller(PostController::class)->group(function () {
                Route::get('/posts', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{post}', 'show')->name('show');
                Route::get('/{post}/edit', 'edit')->name('edit');
                Route::put('/{post}', 'update')->name('update');
                Route::delete('/{post}', 'destroy')->name('destroy');

                Route::put('/{post}/{status}', 'status')->name('status');

                Route::get('/get/submenu/group/{mainmenu_id}', 'getsubmenu')->name('getsubmenu');

                Route::post('/search/posts/', 'search')->name('search');


            });
        });

    });

    Route::prefix('displays')->group(function () {
        Route::name('display.')->group(function () {
            Route::controller(DisplayController::class)->group(function () {
                Route::get('display/posts', 'index')->name('index');
                Route::get('display/create', 'create')->name('create');
                Route::post('display/', 'store')->name('store');
                Route::get('display/{post}', 'show')->name('show');
                Route::get('display/{post}/edit', 'edit')->name('edit');
                Route::put('display/{post}', 'update')->name('update');
                Route::delete('display/{post}', 'destroy')->name('destroy');

                Route::put('display/all/status/{id}/{field}/{value}', 'status')->name('status');

                Route::post('/search/posts/display/', 'displayPostSearch')->name('displayPostSearch');

            });
        });

    });
});

Route::prefix('eposts')->group(function () {
    Route::middleware(['auth', 'subAdmin', 'blacklist'])->group(function () {

        Route::name('epost.')->group(function () {
            Route::controller(EpaperController::class)->group(function () {
                Route::get('/eposts', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{epost}', 'show')->name('show');
                Route::get('/{epost}/edit', 'edit')->name('edit');
                Route::put('/{epost}', 'update')->name('update');
                Route::delete('/{epost}', 'destroy')->name('destroy');

                Route::post('/search/epaper/', 'epaperSearch')->name('epaperSearch');

            });
        });
    });

});
