<?php
use Illuminate\Support\Facades\Route;
use Modules\Website\Http\Controllers\WebsiteController;

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

// Route::prefix('website')->group(function () {
//     Route::get('/', 'WebsiteController@index');
// });

// Route::controller(WebsiteController::class)->group(function () {
//     Route::get('/orders/{id}', 'show');
//     Route::post('/orders', 'store');
// });

Route::group(['prefix' => 'website'], function () {
    Route::controller(WebsiteController::class)->group(function () {
        Route::get('/home', 'index');

    });
});
