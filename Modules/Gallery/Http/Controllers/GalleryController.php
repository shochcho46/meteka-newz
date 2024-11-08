<?php

namespace Modules\Gallery\Http\Controllers;

use App\Helper\Geturl;
use App\Helper\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Gallery\Entities\Albam;
use Modules\Gallery\Entities\Gallery;
use Modules\Gallery\Http\Requests\CreateGalleryRequest;
use Modules\Gallery\Http\Requests\UpdateGalleryRequest;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{

    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();

        $this->headtitle['sub_title'] = __('webstring.gallery');
        $this->headtitle['page_title'] = __('webstring.gallery');
        $this->headtitle['third_title'] = __('webstring.gallery');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();

    }

    public function index()
    {
        $title = $this->headtitle;
        $theading = __('webstring.gallery_list');
        $fromDate = date('Y-m-01');
        $fromDate = Carbon::parse($fromDate)->startOfDay();
        $toDate = date('Y-m-d');
        $toDate = Carbon::parse($toDate)->endOfDay();
        $data = Gallery::with(['albam'])->whereBetween('created_at', [$fromDate, $toDate])->orderByDesc('id')->cursor();
        return view('gallery::gallery.list', compact('data', 'title', 'theading'));
    }

    public function create()
    {
        $title = $this->headtitle;
        $albumList = Albam::all();
        return view('gallery::gallery.create', compact('albumList', 'title'));
    }

    public function store(CreateGalleryRequest $request)
    {
        $getdata = $request->validated();
        $getImg = new Image();
        $mediaDisk = config('media-library.disk_name');

        if ($request->hasFile('picgallery')) {
            $this->validateRequestGalleryPic();
            $getdata['location'] =  $getImg->DefaultImage();
            $getdata['filename'] = $request->picgallery->getClientOriginalName();
            $getdata['created_by'] = 1;
            $gallery = Gallery::create($getdata);
            $gallery->clearMediaCollection('gallery');
            $media =  $gallery->addMedia($request->picgallery)->toMediaCollection('gallery');
            if ( $mediaDisk == "public") {
                unlink($media->getPath());
            }
            if ( $mediaDisk == "s3") {
                Storage::disk('s3')->delete($media->getPath());
            }

            return redirect()->route('gallery.index')->with('success', __('webstring.save_message'));

        } else {
            return redirect()->back()->with('fail', __('webstring.gallery_image_error'));
        }
    }

    public function show($id)
    {
        return view('gallery::show');
    }

    public function edit(Gallery $gallery)
    {
        $title = $this->headtitle;
        $albumList = Albam::all();
        $data = $gallery;
        return view('gallery::gallery.edit', compact('albumList', 'title', 'data'));
    }

    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        $getdata = $request->validated();
        $mediaDisk = config('media-library.disk_name');

        $getImg = new Image();
        $getdata['update_by'] = Auth::user()->id;

        if ($request->hasFile('gallerypicupload')) {
            $this->validateUpdateGalleryPic();

            $getdata['location'] =  $getImg->DefaultImage();
            $getdata['filename'] = $request->gallerypicupload->getClientOriginalName();
            $gallery->clearMediaCollection('gallery');

            $media =  $gallery->addMedia($request->gallerypicupload)->toMediaCollection('gallery');
            if ( $mediaDisk == "public") {
                unlink($media->getPath());
            }
            if ( $mediaDisk == "s3") {
                Storage::disk('s3')->delete($media->getPath());
            }

        }
        $gallery->update($getdata);

        return redirect()->route('gallery.index')->with('update', __('webstring.update_message'));
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('gallery.index')->with('fail', __('webstring.delete_message'));
    }

    public function gallerySearch(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $title = $this->headtitle;
        $theading = __('webstring.gallery_list');
        $fromDate = $request->from_date;
        $fromDateCon = Carbon::parse($fromDate)->startOfDay();
        $toDate = $request->to_date;
        $toDateCon = Carbon::parse($toDate)->endOfDay();
        $data = Gallery::with(['albam'])->whereBetween('created_at', [$fromDateCon, $toDateCon])->orderByDesc('id')->cursor();
        return view('gallery::gallery.list', compact('data', 'title', 'theading', 'fromDate', 'toDate'));

    }

    public function validateRequestGalleryPic()
    {
        if (request()->hasFile('picgallery')) {

            $data = request()->validate([
                'picgallery.*' => 'max:6048|dimensions:max_width=1920,max_height=1080',
            ]);

        }
        return $data;

    }
    public function validateUpdateGalleryPic()
    {
        if (request()->hasFile('gallerypicupload')) {

            $data = request()->validate([
                'gallerypicupload.*' => 'max:6048|dimensions:max_width=1920,max_height=1080',
            ]);

        }
        return $data;

    }
}
