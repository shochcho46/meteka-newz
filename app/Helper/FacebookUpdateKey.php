<?php

namespace App\Helper;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Modules\Websetting\Entities\Facebook;

class FacebookUpdateKey
{

    public function updateFacebookTokenPage()
    {

        $response = Http::get("https://graph.facebook.com/v14.0/oauth/access_token", [
            'grant_type' => 'fb_exchange_token',
            'client_id' => request()->appid,
            'client_secret' => request()->app_secrete_kye,
            'fb_exchange_token' => request()->app_token_page,

        ]);

        $data = $response->json();

        if (array_key_exists("error", $data)) {
            return "error";

        }

        if (array_key_exists("access_token", $data)) {
            return $data['access_token'];
        }

    }

    public function postOnPageFacebook($postUrl)
    {
        $Fbdata = Facebook::first();

        $currentDate = Carbon::now();
        $formatted_currentDay = Carbon::parse($currentDate);

        $formatted_fbupdateDay = Carbon::parse($Fbdata->updated_at);

        $date_diff = $formatted_currentDay->diffInDays($formatted_fbupdateDay);

        if ($date_diff == 7) {

            $this->UpdateFbTokenPage();
        }

        $url = $postUrl;

        $page_response = Http::post('https://graph.facebook.com/' . $Fbdata->pageid . '/feed', [
            'link' => $url,
            'access_token' => $Fbdata->app_long_token_page,
        ]);

        $data = $page_response->json();
        if (array_key_exists("error", $data)) {
            return "error";

        }

        if (array_key_exists("id", $data)) {

            Session::flash('update', __('webstring.facebook_page_publish'));
            return "success";
        }
    }

    public function UpdateFbTokenPage()
    {
        $Fbdata = Facebook::first();
        $response = Http::get("https://graph.facebook.com/v14.0/oauth/access_token", [
            'grant_type' => 'fb_exchange_token',
            'client_id' => $Fbdata->appid,
            'client_secret' => $Fbdata->app_secrete_kye,
            'fb_exchange_token' => $Fbdata->app_long_token_page,

        ]);

        $data = $response->json();

        if (array_key_exists("error", $data)) {

            Session::flash('warning', __('webstring.facebook_page_error'));

            return "error";

        }

        if (array_key_exists("access_token", $data)) {
            Session::flash('update', __('webstring.facebook_new_token'));

            $Fbdata->app_token_page = $data['access_token'];
            $Fbdata->app_long_token_page = $data['access_token'];
            $Fbdata->save();
            return $data['access_token'];
        }

    }

}
