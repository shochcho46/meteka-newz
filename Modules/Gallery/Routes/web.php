<?php

use Illuminate\Support\Facades\Route;
use Modules\Gallery\Http\Controllers\AlbamController;
use Modules\Gallery\Http\Controllers\GalleryController;

Route::prefix('galleries')->group(function () {
    Route::middleware(['auth', 'subAdmin', 'blacklist'])->group(function () {
        Route::name('albam.')->group(function () {
            Route::controller(AlbamController::class)->group(function () {
                Route::get('album/', 'index')->name('index');
                Route::get('album/create', 'create')->name('create');
                Route::post('album/', 'store')->name('store');
                Route::get('album/{album}/edit', 'edit')->name('edit');
                Route::put('album/{album}', 'update')->name('update');
                Route::delete('album/{album}', 'destroy')->name('destroy');

                Route::post('/search/album/', 'albumSearch')->name('albumSearch');

            });
        });

        Route::name('gallery.')->group(function () {
            Route::controller(GalleryController::class)->group(function () {
                Route::get('image/', 'index')->name('index');
                Route::get('image/create', 'create')->name('create');
                Route::post('image/', 'store')->name('store');
                Route::get('image/{gallery}/edit', 'edit')->name('edit');
                Route::put('image/{gallery}', 'update')->name('update');
                Route::delete('image/{gallery}', 'destroy')->name('destroy');

                Route::post('/search/gallery/', 'gallerySearch')->name('gallerySearch');

            });
        });

    });
});
