<?php
use Illuminate\Support\Facades\Route;
use Modules\Websetting\Http\Controllers\FacebookController;
use Modules\Websetting\Http\Controllers\FooterController;
use Modules\Websetting\Http\Controllers\SocialController;
use Modules\Websetting\Http\Controllers\WebsettingController;

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

Route::prefix('websettings')->group(function () {
    Route::middleware(['admin', 'admin'])->group(function () {
        Route::name('websetting.')->group(function () {
            Route::controller(WebsettingController::class)->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{websetting}/edit', 'edit')->name('edit');
                Route::put('/{websetting}', 'update')->name('update');
                Route::delete('/{websetting}', 'destroy')->name('destroy');

                Route::post('/logo', 'logoUpload')->name('logo');
                Route::post('/favicon', 'FaviconUpload')->name('favicon');
            });
        });
    });
});

Route::prefix('footers')->group(function () {
    Route::middleware(['auth', 'subAdmin', 'blacklist'])->group(function () {
        Route::name('footer.')->group(function () {
            Route::controller(FooterController::class)->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{footer}/edit', 'edit')->name('edit');
                Route::put('/{footer}', 'update')->name('update');
                Route::delete('/{footer}', 'destroy')->name('destroy');

            });
        });
    });
});

Route::prefix('socials')->group(function () {
    Route::middleware(['auth', 'subAdmin', 'blacklist'])->group(function () {
        Route::name('social.')->group(function () {
            Route::controller(SocialController::class)->group(function () {
                Route::get('/socials', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{social}/edit', 'edit')->name('edit');
                Route::put('/{social}', 'update')->name('update');
                Route::delete('/{social}', 'destroy')->name('destroy');

            });
        });
    });
});

Route::prefix('facebooks')->group(function () {
    Route::middleware(['auth', 'superAdmin', 'blacklist'])->group(function () {
        Route::name('facebook.')->group(function () {
            Route::controller(FacebookController::class)->group(function () {

                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{facebook}/edit', 'edit')->name('edit');
                Route::put('/{facebook}', 'update')->name('update');
                Route::delete('/{facebook}', 'destroy')->name('destroy');

            });
        });
    });
});
