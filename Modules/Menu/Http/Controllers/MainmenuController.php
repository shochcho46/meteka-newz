<?php

namespace Modules\Menu\Http\Controllers;

use App\Helper\Geturl;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Menu\Entities\Mainmenu;
use Modules\Menu\Http\Requests\StoreMainmenuRequest;
use Modules\Menu\Http\Requests\UpdateMainmenuRequest;

class MainmenuController extends Controller
{
    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();
        $this->headtitle['sub_title'] = __('webstring.menu');
        $this->headtitle['page_title'] = __('webstring.menu');
        $this->headtitle['third_title'] = __('webstring.main_menu');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();
    }
    public function index()
    {
        $title = $this->headtitle;
        $theading = __('webstring.main_menu_table');
        $data = Mainmenu::orderBy('serial', 'asc')->get();

        return view('menu::mainmenu.list', compact('title', 'theading', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        $title = $this->headtitle;
        return view('menu::mainmenu.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreMainmenuRequest $request)
    {
        $getdata = $request->validated();
        $getdata['status'] = 1;
        $getdata['slug'] = date('YmdHis');
        Mainmenu::create($getdata);
        return redirect()->route('mainmenu.index')->with('success', __('webstring.save_message'));
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
    public function edit(Mainmenu $menu)
    {
        $title = $this->headtitle;
        $data = $menu;
        return view('menu::mainmenu.edit', compact('title', 'data'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateMainmenuRequest $request, Mainmenu $menu)
    {
        $getdata = $request->validated();
        $menu->update($getdata);
        return redirect()->route('mainmenu.index')->with('update', __('webstring.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Mainmenu $menu)
    {
        $menu->delete();
        return redirect()->route('mainmenu.index')->with('fail', __('webstring.delete_message'));
    }

    public function status(Mainmenu $menu, $status)
    {
        $menu->status = $status;
        $menu->save();
        return redirect()->route('mainmenu.index')->with('success', __('webstring.update_message'));
    }
}
