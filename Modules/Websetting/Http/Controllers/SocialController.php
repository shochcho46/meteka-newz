<?php

namespace Modules\Websetting\Http\Controllers;

use App\Helper\Geturl;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Websetting\Entities\Social;
use Modules\Websetting\Http\Requests\StoreSocialRequest;
use Modules\Websetting\Http\Requests\UpdateSocialRequest;

class SocialController extends Controller
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

    public function index()
    {

        $title = $this->headtitle;
        $theading = __('webstring.social_table');
        $data = Social::all();
        return view('websetting::social.list', compact('title', 'data', 'theading'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $title = $this->headtitle;

        return view('websetting::social.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreSocialRequest $request)
    {

        $getdata = $request->validated();
        $getdata['link'] = $request->link;
        Social::create($getdata);
        return redirect()->route('social.index')->with('success', __('webstring.save_message'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('websetting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Social $social)
    {
        $title = $this->headtitle;
        $data = $social;
        return view('websetting::social.edit', compact('data', 'title'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateSocialRequest $request, Social $social)
    {
        $getdata = $request->validated();
        $getdata['link'] = $request->link;
        $social->update($getdata);
        return redirect()->route('social.index')->with('success', __('webstring.update_message'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Social $social)
    {
        $social->delete();
        return redirect()->route('social.index')->with('fail', __('webstring.delete_message'));
    }
}
