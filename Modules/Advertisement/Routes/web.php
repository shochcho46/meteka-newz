<?php

use Illuminate\Support\Facades\Route;
use Modules\Advertisement\Http\Controllers\AdvertisementController;

Route::prefix('advertisements')->group(function () {
    Route::middleware(['auth', 'subAdmin', 'blacklist'])->group(function () {
        Route::name('advertisement.')->group(function () {
            Route::controller(AdvertisementController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{advertise}/edit', 'edit')->name('edit');
                Route::put('/{advertise}', 'update')->name('update');
                Route::delete('/{advertise}', 'destroy')->name('destroy');

            });
        });

    });
});
