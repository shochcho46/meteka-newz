<?php

namespace Modules\Advertisement\Http\Controllers;

use App\Helper\Geturl;
use App\Helper\Image;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Routing\Controller;
use Modules\Advertisement\Entities\Advertisement;
use Modules\Advertisement\Http\Requests\CreateAdvertiseRequest;
use Modules\Advertisement\Http\Requests\UpdateAdvertiseRequest;

class AdvertisementController extends Controller
{

    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();

        $this->headtitle['sub_title'] = __('webstring.advertise');
        $this->headtitle['page_title'] = __('webstring.advertise');
        $this->headtitle['third_title'] = __('webstring.advertise');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();

    }
    public function index()
    {
        $title = $this->headtitle;
        $theading = __('webstring.advertise_list');
        $data = Advertisement::all();
        return view('advertisement::advertisement.list', compact('data', 'title', 'theading'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $title = $this->headtitle;
        return view('advertisement::advertisement.create', compact('title'));
    }

    public function store(CreateAdvertiseRequest $request)
    {

        $getdata = $request->validated();
        $getImg = new Image();
        if ($request->hasFile('picadvertise')) {
            $this->validateRequestAdvertisementPic();
            $uploadPath = "advertisement";
            $fileRequst = "picadvertise";
            $getdata['location'] = $getImg->UploadImage($uploadPath, $fileRequst);
            $getdata['filename'] = str_replace("storage/advertisement/", "", $getdata['location']);
            $getdata['created_by'] = 1;

            Advertisement::create($getdata);
            return redirect()->route('advertisement.index')->with('success', __('webstring.save_message'));

        } else {
            return redirect()->back()->with('fail', __('webstring.advertise_image_error'));
        }

    }

    public function show($id)
    {
        return view('advertisement::show');
    }

    public function edit(Advertisement $advertise)
    {
        $title = $this->headtitle;
        $data = $advertise;
        return view('advertisement::advertisement.edit', compact('title', 'data'));
    }

    public function update(UpdateAdvertiseRequest $request, Advertisement $advertise)
    {
        $getdata = $request->validated();

        $getImg = new Image();
        $getdata['update_by'] = 1;

        if ($request->hasFile('advertisepicupload')) {
            $this->validateUpdateAdvertisementPic();
            $uploadPath = "advertisement";
            $fileRequst = "advertisepicupload";
            $getdata['location'] = $getImg->UploadImage($uploadPath, $fileRequst);
            $getdata['filename'] = str_replace("storage/advertisement/", "", $getdata['location']);

        } else {
            $getdata['location'] = $request->updateadvertisepic;
            $getdata['filename'] = str_replace("storage/advertisement/", "", $getdata['location']);
        }
        $advertise->update($getdata);

        return redirect()->route('advertisement.index')->with('update', __('webstring.update_message'));
    }

    public function destroy(Advertisement $advertise)
    {
        $advertise->delete();
        return redirect()->route('advertisement.index')->with('fail', __('webstring.delete_message'));

    }

    public function validateRequestAdvertisementPic()
    {
        if (request()->hasFile('picadvertise')) {

            $data = request()->validate([
                'picadvertise.*' => 'max:6048|dimensions:max_width=1920,max_height=1080',
            ]);

        }
        return $data;

    }
    public function validateUpdateAdvertisementPic()
    {
        if (request()->hasFile('advertisepicupload')) {

            $data = request()->validate([
                'advertisepicupload.*' => 'max:6048|dimensions:max_width=1920,max_height=1080',
            ]);

        }
        return $data;

    }
}
