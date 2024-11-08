<?php

namespace Modules\Seo\Http\Controllers;

use App\Helper\Geturl;
use Illuminate\Routing\Controller;
use Modules\Seo\Entities\Seo;
use Modules\Seo\Http\Requests\StoreSeoRequest;
use Modules\Seo\Http\Requests\UpdateSeoRequest;

class SeoController extends Controller
{

    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();
        $this->headtitle['sub_title'] = __('webstring.seo');
        $this->headtitle['page_title'] = __('webstring.seo');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();
    }
    public function create()
    {
        $title = $this->headtitle;
        $data = Seo::first();
        if (empty($data)) {
            return view('seo::create', compact('title'));
        } else {
            return view('seo::edit', compact('title', 'data'));
        }

    }

    public function store(StoreSeoRequest $request)
    {
        $getdata = $request->validated();
        $getdata['refresh'] = $request->refresh;
        $getdata['gverify'] = $request->gverify;
        Seo::create($getdata);
        return redirect()->route('seo.create')->with('success', __('webstring.save_message'));
    }

    public function update(UpdateSeoRequest $request, Seo $seo)
    {
        $getdata = $request->validated();
        $getdata['refresh'] = $request->refresh;
        $getdata['gverify'] = $request->gverify;
        $seo->update($getdata);
        return redirect()->route('seo.create')->with('update', __('webstring.update_message'));
    }

}
