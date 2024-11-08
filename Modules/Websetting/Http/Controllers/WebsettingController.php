<?php

namespace Modules\Websetting\Http\Controllers;

use App\Helper\Getdata;
use App\Helper\Geturl;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Websetting\Entities\Websetting;
use Modules\Websetting\Http\Requests\StoreWebsettingRequest;
use Modules\Websetting\Http\Requests\UpdateWebsettingRequest;

class WebsettingController extends Controller
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
        $getdata = new Getdata();

        $dbdata['country'] = $getdata->GetAllCountry();
        $dbdata['timezone'] = $getdata->GetAllTimezone();
        $dbdata['lngcode'] = $getdata->GetAllLngCode();
        $dbdata['font'] = $getdata->GetAllFont();

        $data = Websetting::first();

        if (empty($data)) {

            return view('websetting::webconfig.create', compact('title', 'dbdata'));
        } else {

            return view('websetting::webconfig.edit', compact('title', 'dbdata', 'data'));
        }

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreWebsettingRequest $request)
    {
        $getdata = $request->validated();
        $getdata['apptitle'] = $request->apptitle;
        Websetting::create($getdata);
        return redirect()->route('websetting.create')->with('success', __('webstring.save_message'));

    }

    public function logoUpload(Request $request)
    {
        if ($request->hasFile('logoupload')) {
            $this->validateRequestLogo();
            $images = $request->file('logoupload');
            $imagepath = "";
            foreach ($images as $key => $imgvalue) {
                $extension = $imgvalue->extension();
                $filename = time() . '.' . $extension;
                $path = $imgvalue->storeAs('websetting', $filename, 'public');
                $fullpathurl = 'storage/' . $path;
                $imagepath = $fullpathurl;

            }
            $websetting = Websetting::find(1);
            $websetting->logo = $imagepath;
            $websetting->save();
            return redirect()->route('websetting.create')->with('success', __('webstring.save_message'));

        } else {
            if (!empty($request->upeditlogo)) {
                $websetting = Websetting::find(1);
                $websetting->logo = $request->upeditlogo;
                $websetting->save();
                return redirect()->route('websetting.create')->with('success', __('webstring.save_message'));
            }
            return redirect()->route('websetting.create')->with('fail', __('webstring.fail_message'));
        }
    }

    public function FaviconUpload(Request $request)
    {
        if ($request->hasFile('favupload')) {
            $this->validateRequestFavicon();
            $images = $request->file('favupload');
            $imagepath = "";
            foreach ($images as $key => $imgvalue) {
                $extension = $imgvalue->extension();
                $filename = time() . '.' . $extension;
                $path = $imgvalue->storeAs('websetting', $filename, 'public');
                $fullpathurl = 'storage/' . $path;
                $imagepath = $fullpathurl;

            }
            $websetting = Websetting::find(1);
            $websetting->favicone = $imagepath;
            $websetting->save();
            return redirect()->route('websetting.create')->with('success', __('webstring.save_message'));

        } else {
            if (!empty($request->upeditfavioc)) {

                $websetting = Websetting::find(1);
                $websetting->favicone = $request->upeditfavioc;
                $websetting->save();
                return redirect()->route('websetting.create')->with('success', __('webstring.save_message'));
            }

            return redirect()->route('websetting.create')->with('fail', __('webstring.fail_message'));
        }
    }

    public function update(UpdateWebsettingRequest $request, Websetting $websetting)
    {
        $getdata = $request->validated();
        $getdata['apptitle'] = $request->apptitle;
        $websetting->update($getdata);
        return redirect()->route('websetting.create')->with('success', __('webstring.save_message'));
    }

    public function validateRequestLogo()
    {
        if (request()->hasFile('logoupload')) {

            $data = request()->validate([

                'logoupload.*' => 'max:2048|dimensions:max_width=500,max_height=150',
            ]);

        }
        return $data;

    }

    public function validateRequestFavicon()
    {
        if (request()->hasFile('favupload')) {

            $data = request()->validate([

                'favupload.*' => 'max:2048|dimensions:max_width=70,max_height=70',
            ]);

        }
        return $data;

    }

}
