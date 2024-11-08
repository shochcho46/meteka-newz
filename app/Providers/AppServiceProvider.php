<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Advertisement\Entities\Advertisement;
use Modules\Menu\Entities\Mainmenu;
use Modules\Seo\Entities\Seo;
use Modules\Websetting\Entities\Facebook;
use Modules\Websetting\Entities\Footer;
use Modules\Websetting\Entities\Websetting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        $footerData = Footer::first();
        if (!empty($footerData)) {
            view()->share('footerData', $footerData);
        };

        $webconfigData = Websetting::first();

        if (!empty($webconfigData)) {
            view()->share('webcongigData', $webconfigData);

        };

        $allmenu = Mainmenu::with('submenus')->where('status', 1)->orderBy('serial', 'asc')->get();
        if (!empty($allmenu)) {
            view()->share('allmenu', $allmenu);
        };

        $facebookData = Facebook::first();
        if (!empty($facebookData)) {
            view()->share('facebook', $facebookData);
        };

        $date['bangla'] = bangla_date(time());
        $date['banglish'] = bangla_date(time(), "en");
        $date['english'] = date('d F, Y');
        if (!empty($allmenu)) {
            view()->share('date', $date);
        };

        $allAdvertise = Advertisement::all();
        if (!empty($allAdvertise)) {
            view()->share('advertise', $allAdvertise);
        };

        $seoData = Seo::first();
        if (!empty($seoData)) {
            view()->share('seoData', $seoData);
        };


    }
}
