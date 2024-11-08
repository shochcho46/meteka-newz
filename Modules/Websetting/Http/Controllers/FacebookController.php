<?php

namespace Modules\Websetting\Http\Controllers;

use App\Helper\FacebookUpdateKey;
use App\Helper\Geturl;
use Illuminate\Routing\Controller;
use Modules\Websetting\Entities\Facebook;
use Modules\Websetting\Http\Requests\CreateFacebookRequest;
use Modules\Websetting\Http\Requests\UpdateFacebookRequest;

class FacebookController extends Controller
{

    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();

        $this->headtitle['sub_title'] = __('webstring.webconfig');
        $this->headtitle['page_title'] = __('webstring.web_setting');
        $this->headtitle['third_title'] = __('webstring.facebook');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();
    }

    public function create()
    {

        $title = $this->headtitle;

        $data = Facebook::first();

        if (empty($data)) {

            return view('websetting::facebook.create', compact('title'));
        } else {

            return view('websetting::facebook.edit', compact('title', 'data'));
        }

    }

    public function store(CreateFacebookRequest $request)
    {
        $getdata = $request->validated();
        $fb = new FacebookUpdateKey();

        $pagetokn = $fb->updateFacebookTokenPage();

        if ($pagetokn == "error") {
            return redirect()->route('facebook.create')->withErrors(['app_token_user' => 'Please Collect New Token For Page']);
        } else {
            $getdata['app_long_token_page'] = $fb->updateFacebookTokenPage();
        }

        Facebook::create($getdata);
        return redirect()->route('facebook.create')->with('success', __('webstring.save_message'));
    }

    public function update(UpdateFacebookRequest $request, Facebook $facebook)
    {
        $getdata = $request->validated();
        $fb = new FacebookUpdateKey();

        $pagetokn = $fb->updateFacebookTokenPage();
        if ($pagetokn == "error") {
            return redirect()->route('facebook.create')->withErrors(['app_token_user' => 'Please Collect New Token For Page']);
        } else {
            $getdata['app_long_token_page'] = $fb->updateFacebookTokenPage();
        }

        $facebook->update($getdata);
        return redirect()->route('facebook.create')->with('success', __('webstring.update_message'));
    }

}
