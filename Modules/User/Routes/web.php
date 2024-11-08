<?php
use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\CreateUserController;
use Modules\User\Http\Controllers\ProfileController;
use Modules\User\Http\Controllers\UserController;

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
// admin controller
Route::group(['prefix' => 'admin'], function () {
    Route::middleware(['auth', 'subAdmin'])->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/home', 'adminHome')->name('admin.home');

        });
    });
});

// reguser controller
Route::group(['prefix' => 'reguser'], function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('/home', 'regUserHome')->name('reguser.home');

    });
});

Route::prefix('profiles')->group(function () {
    Route::middleware(['auth', 'subAdmin'])->group(function () {
        Route::name('profile.')->group(function () {
            Route::controller(ProfileController::class)->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::put('/personal/{udetail}', 'updatepersonal')->name('updatepersonal');
                Route::put('/password/update/{user}', 'passwordUpdate')->name('passwordupdate');
                Route::put('/login/info/update/{user}', 'loginInfoUpdate')->name('logininfoupdate');
                Route::put('/profile/img/update/{udetail}', 'profilePicUpload')->name('profileimgupdate');
                Route::put('/document/img/update/{udetail}', 'documentPicUpload')->name('documentimgupdate');

            });
        });
    });
});

Route::prefix('users')->group(function () {
    // Route::middleware(['admin', 'subadmin'])->group(function () {
    Route::name('user.')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{user}/edit', 'edit')->name('edit');
            Route::put('/{user}', 'update')->name('update');
            Route::delete('/{user}', 'destroy')->name('destroy');

        });
    });
    // });
});

Route::prefix('createusers')->group(function () {
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::name('createuser.')->group(function () {
            Route::controller(CreateUserController::class)->group(function () {
                Route::get('/normal', 'normalindex')->name('normalindex');
                Route::get('/admin', 'index')->name('adminindex');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{createuser}/edit', 'edit')->name('edit');
                Route::put('/{createuser}', 'update')->name('update');
                Route::put('/password/{createuser}', 'passWordUpdate')->name('passupdate');
                Route::delete('/{createuser}', 'destroy')->name('destroy');
                Route::put('/status/{id}/{field}/{value}', 'status')->name('status');
            });
        });
    });
});
