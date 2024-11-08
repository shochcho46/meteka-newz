<?php

namespace Modules\Gallery\Http\Controllers;

use App\Helper\Geturl;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gallery\Entities\Albam;
use Modules\Gallery\Http\Requests\CreateAlbamRequest;
use Modules\Gallery\Http\Requests\UpdateAlbamRequest;

class AlbamController extends Controller
{

    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();

        $this->headtitle['sub_title'] = __('webstring.gallery');
        $this->headtitle['page_title'] = __('webstring.album');
        $this->headtitle['third_title'] = __('webstring.album');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();

    }
    public function index()
    {
        $title = $this->headtitle;
        $theading = __('webstring.album_list');
        $fromDate = date('Y-m-01');
        $fromDate = Carbon::parse($fromDate)->startOfDay();
        $toDate = date('Y-m-d');
        $toDate = Carbon::parse($toDate)->endOfDay();
        $data = Albam::whereBetween('created_at', [$fromDate, $toDate])->orderByDesc('id')->cursor();
        return view('gallery::albam.list', compact('data', 'title', 'theading'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $title = $this->headtitle;
        return view('gallery::albam.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateAlbamRequest $request)
    {
        $getdata = $request->validated();
        $getdata['created_by'] = 1;
        Albam::create($getdata);
        return redirect()->route('albam.index')->with('success', __('webstring.save_message'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('gallery::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Albam $album)
    {
        $title = $this->headtitle;
        $data = $album;
        return view('gallery::albam.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateAlbamRequest $request, Albam $album)
    {
        $getdata = $request->validated();
        $getdata['update_by'] = 1;
        $album->update($getdata);
        return redirect()->route('albam.index')->with('update', __('webstring.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Albam $album)
    {
        $album->delete();
        return redirect()->route('albam.index')->with('fail', __('webstring.delete_message'));
    }

    public function albumSearch(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $title = $this->headtitle;
        $theading = __('webstring.album_list');
        $fromDate = $request->from_date;
        $fromDateCon = Carbon::parse($fromDate)->startOfDay();
        $toDate = $request->to_date;
        $toDateCon = Carbon::parse($toDate)->endOfDay();
        $data = Albam::whereBetween('created_at', [$fromDateCon, $toDateCon])->orderByDesc('id')->cursor();
        return view('gallery::albam.list', compact('data', 'title', 'theading', 'fromDate', 'toDate'));

    }
}
