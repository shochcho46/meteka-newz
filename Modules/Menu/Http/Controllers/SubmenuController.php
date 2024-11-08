<?php

namespace Modules\Menu\Http\Controllers;

use App\Helper\Geturl;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Mainmenu;
use Modules\Menu\Entities\Submenu;
use Modules\Menu\Http\Requests\StoreSubmenuRequest;
use Modules\Menu\Http\Requests\UpdateSubmenuRequest;

class SubmenuController extends Controller
{
    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();
        $this->headtitle['sub_title'] = __('webstring.menu');
        $this->headtitle['page_title'] = __('webstring.menu');
        $this->headtitle['third_title'] = __('webstring.sub_menu');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();
    }
    public function index()
    {
        $title = $this->headtitle;
        $theading = __('webstring.sub_menu_table');
        $data = Submenu::orderBy('serial', 'asc')->orderBy('mainmenu_id', 'asc')->get();

        return view('menu::submenu.list', compact('title', 'theading', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $title = $this->headtitle;
        $mainmenu = Mainmenu::where('status', 1)->get();
        return view('menu::submenu.create', compact('title', 'mainmenu'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreSubmenuRequest $request)
    {
        $getdata = $request->validated();
        $getdata['status'] = 1;
        $getdata['slug'] = date('YmdHis');
        Submenu::create($getdata);
        return redirect()->route('submenu.index')->with('success', __('webstring.save_message'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('menu::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Submenu $submenu)
    {
        $title = $this->headtitle;
        $data = $submenu;
        $mainmenu = Mainmenu::where('status', 1)->get();
        return view('menu::submenu.edit', compact('title', 'data', 'mainmenu'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateSubmenuRequest $request, Submenu $submenu)
    {

        $getdata = $request->validated();
        $submenu->update($getdata);
        return redirect()->route('submenu.index')->with('success', __('webstring.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Submenu $submenu)
    {
        $submenu->delete();
        return redirect()->route('submenu.index')->with('fail', __('webstring.delete_message'));
    }

    public function status(Submenu $submenu, $status)
    {
        $submenu->status = $status;
        $submenu->save();
        return redirect()->route('submenu.index')->with('success', __('webstring.update_message'));
    }
}
