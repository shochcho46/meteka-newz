<?php

namespace Modules\Websetting\Http\Controllers;

use App\Helper\Geturl;
use Illuminate\Routing\Controller;
use Modules\Websetting\Entities\Footer;
use Modules\Websetting\Http\Requests\StoreFooterRequest;
use Modules\Websetting\Http\Requests\UpdateFooterRequest;

class FooterController extends Controller
{
    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();
        $this->headtitle['sub_title'] = __('webstring.webconfig');
        $this->headtitle['page_title'] = __('webstring.web_setting');
        $this->headtitle['third_title'] = __('webstring.social');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();
    }
    public function create()
    {
        $title = $this->headtitle;
        $data = Footer::first();

        if (empty($data)) {
            return view('websetting::footer.create', compact('title'));
        } else {
            return view('websetting::footer.edit', compact('title', 'data'));
        }

    }

    public function store(StoreFooterRequest $request)
    {

        $getdata = $request->validated();
        $getdata['location_text'] = $request->location_text;
        Footer::create($getdata);

        return redirect()->route('footer.create')->with('success', __('webstring.save_message'));
    }

    public function update(UpdateFooterRequest $request, Footer $footer)
    {
        $getdata = $request->validated();
        $getdata['location_text'] = $request->location_text;
        $footer->update($getdata);
        return redirect()->route('footer.create')->with('success', __('webstring.update_message'));
    }

}
