<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::name('home.')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'home')->name('page');
        Route::get('/show/{display}', 'show')->name('postshow');
        Route::get('/show/news/{display}/{slug}', 'showNews')->name('newsWithSlug');
        Route::get('/show/mainmenu/{mainmenu}', 'mainmenu')->name('mainmenupost');
        Route::get('/show/submenu/{submenu}', 'submenu')->name('submenupost');
        Route::get('/load/show/archive', 'loadarchive')->name('loadarchive');
        Route::post('/show/archive', 'archive')->name('archive');
        Route::get('/show/archive/post/{postdate}', 'archivePostDiplay')->name('showarchive');

        Route::get('/load/show/gallery/albums', 'loadgallery')->name('loadgallery');
        Route::post('/load/show/gallery/picture', 'albumlist')->name('albumlist');
        Route::get('/show/albums/gallery/{gallery}', 'displayalbum')->name('displayalbum');
        Route::get('/show/single/albums/gallery/{albumid}', 'imagedisplay')->name('imagedisplay');

        Route::get('/print/post/{post}', 'print')->name('print');

        Route::get('/news_sitemap.xml', 'newsXml')->name('newsXml');

        Route::get('/about', 'about')->name('aboutUs');
        Route::get('/privacy', 'privacy')->name('privacy');
        Route::get('/terms', 'terms')->name('terms');
    });
});




// Clear view cache:
    Route::get('/clear', function() {
        Artisan::call('optimize:clear');
        return 'All cache has been cleared';
    });

// All Optimization and cache store
    Route::get('/cacheall', function() {
        Artisan::call('config:cache');
        Artisan::call('route:cache');
        Artisan::call('view:cache');
        return 'All Optimization and cache store';
    });
