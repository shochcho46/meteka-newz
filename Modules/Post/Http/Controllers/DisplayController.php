<?php

namespace Modules\Post\Http\Controllers;

use App\Helper\Geturl;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Display;

class DisplayController extends Controller
{
    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();

        $this->headtitle['sub_title'] = __('webstring.post');
        $this->headtitle['page_title'] = __('webstring.display');
        $this->headtitle['third_title'] = __('webstring.display');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();

    }
    public function index()
    {
        $title = $this->headtitle;
        $theading = __('webstring.display_table');

        $fromDate = date('Y-m-01');
        $fromDate = Carbon::parse($fromDate)->startOfDay();
        $toDate = date('Y-m-d');
        $toDate = Carbon::parse($toDate)->endOfDay();
        $data = Display::with('post', 'mainmenu', 'submenu')->whereBetween('created_at', [$fromDate, $toDate])->orderBy('id', 'DESC')->cursor();
        return view('post::display.list', compact('data', 'title', 'theading'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('post::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        return view('post::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Display $post)
    {
        $post->delete();
        return redirect()->route('display.index')->with('fail', __('webstring.delete_message'));
    }

    public function status($id, $field, $value)
    {
        $display = Display::find($id);
        // $display->timestamps = false;
        if ($field != "is_headline") {
            $display->timestamps = false;
        }
        $display->update([$field => $value]);

        return redirect()->route('display.index')->with('success', __('webstring.update_message'));
    }

    public function displayPostSearch(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date',
        ]);

        $title = $this->headtitle;
        $theading = __('webstring.display_table');

        $fromDate = $request->from_date;
        $fromDateCon = Carbon::parse($fromDate)->startOfDay();
        $toDate = $request->to_date;
        $toDateCon = Carbon::parse($toDate)->endOfDay();

        $data = Display::with('post', 'mainmenu', 'submenu')->whereBetween('created_at', [$fromDate, $toDate])->orderBy('id', 'DESC')->cursor();
        return view('post::display.list', compact('data', 'title', 'theading', 'fromDate', 'toDate'));

    }
}
