<?php

namespace Modules\Post\Http\Controllers;

use App\Helper\Geturl;
use App\Helper\Image;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Epaper;
use Modules\Post\Http\Requests\StoreEpaperRequest;
use Modules\Post\Http\Requests\UpdateEpaperRequest;
use Illuminate\Support\Facades\Auth;

// use Carbon\Carbon;

class EpaperController extends Controller
{
    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();

        $this->headtitle['sub_title'] = __('webstring.epaper');
        $this->headtitle['page_title'] = __('webstring.epaper');
        $this->headtitle['third_title'] = __('webstring.epaper');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();

    }
    public function index()
    {
        $title = $this->headtitle;
        $theading = __('webstring.epaper_table');
        $fromDate = date('Y-m-01');
        $fromDate = Carbon::parse($fromDate)->startOfDay();
        $toDate = date('Y-m-d');
        $toDate = Carbon::parse($toDate)->endOfDay();
        $data = Epaper::whereBetween('created_at', [$fromDate, $toDate])->orderByDesc('id')->cursor();
        return view('post::epaper.list', compact('data', 'title', 'theading'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $title = $this->headtitle;

        return view('post::epaper.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreEpaperRequest $request)
    {

        $getdata = $request->validated();
        $getImg = new Image();

        if ($request->hasFile('epaper')) {
            $this->validateRequestEpaperPic();
            $uploadPath = "epaper";
            $fileRequst = "epaper";
            $getdata['location'] = $getImg->UploadImage($uploadPath, $fileRequst);
            $getdata['filename'] = str_replace("storage/epaper/", "", $getdata['location']);
            $getdata['created_by'] = Auth::id();

            Epaper::create($getdata);
            return redirect()->route('epost.index')->with('success', __('webstring.save_message'));

        } else {
            return redirect()->back()->with('fail', __('webstring.epaper_image_error'));
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('post::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Epaper $epost)
    {
        $title = $this->headtitle;
        $data = $epost;

        return view('post::epaper.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateEpaperRequest $request, Epaper $epost)
    {
        $getdata = $request->validated();
        $getImg = new Image();
        $getdata['update_by'] = Auth::id();

        if ($request->hasFile('epaperpicupload')) {
            $this->validateUpdateEpaperPic();
            $uploadPath = "epaper";
            $fileRequst = "epaperpicupload";
            $getdata['location'] = $getImg->UploadImage($uploadPath, $fileRequst);
            $getdata['filename'] = str_replace("storage/epaper/", "", $getdata['location']);

        } else {
            $getdata['location'] = $request->updateepaperpic;
            $getdata['filename'] = str_replace("storage/epaper/", "", $getdata['location']);
        }

        $epost->update($getdata);

        return redirect()->route('epost.index')->with('update', __('webstring.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Epaper $epost)
    {
        $epost->delete();
        return redirect()->route('epost.index')->with('fail', __('webstring.delete_message'));
    }

    public function validateRequestEpaperPic()
    {
        if (request()->hasFile('epaper')) {

            $data = request()->validate([
                'epaper.*' => 'max:10048|dimensions:max_width=10040,max_height=20160',
            ]);

        }
        return $data;

    }
    public function validateUpdateEpaperPic()
    {
        if (request()->hasFile('epaperpicupload')) {

            $data = request()->validate([
                'epaperpicupload.*' => 'max:10048|dimensions:max_width=10040,max_height=20160',
            ]);

        }
        return $data;

    }

    public function epaperSearch(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $title = $this->headtitle;
        $theading = __('webstring.epaper_table');
        $fromDate = $request->from_date;
        $fromDateCon = Carbon::parse($fromDate)->startOfDay();
        $toDate = $request->to_date;
        $toDateCon = Carbon::parse($toDate)->endOfDay();
        $data = Epaper::whereBetween('created_at', [$fromDateCon, $toDateCon])->orderByDesc('id')->cursor();
        return view('post::epaper.list', compact('data', 'title', 'theading', 'fromDate', 'toDate'));

    }
}
