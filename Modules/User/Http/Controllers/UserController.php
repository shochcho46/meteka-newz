<?php

namespace Modules\User\Http\Controllers;

use App\Helper\Dashboard;
use App\Helper\Geturl;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\Udetail;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();
        $this->headtitle['sub_title'] = __('webstring.dashboard');
        $this->headtitle['page_title'] = __('webstring.dashboard');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();
    }
    public function adminHome()
    {
        $title = $this->headtitle;

        $dashboard = new Dashboard();
        $cardData = $dashboard->cardDetail();
        $chartData = $dashboard->chartData();
        return view('layout.admin.dashboard', compact('title', 'cardData', 'chartData'));
    }

    public function regUserHome()
    {
        return view('layout.reguser.home');
    }
    public function index()
    {
        return view('user::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::create');

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(StoreUserRequest $request)
    {
        $getdata = $request->validated();

        $userData['email'] = $request->email;
        $userData['mobile'] = $request->mobile;
        $userData['password'] = Hash::make($request->password);
        $userData['slug'] = date('YmdHis');
        $userData['type'] = 4;
        $userData['status'] = 1;
        DB::transaction(function () use ($userData, $request) {
            $userid = User::create($userData);
            $userDetail['user_id'] = $userid->id;
            $userDetail['name'] = $request->name;
            $userDetail['country_id'] = 1;
            $userDetail['imgloc'] = 'storage/profile/profile.jpg';
            $userDetail['idimgloc'] = 'storage/document/docupic.jpg';
            Udetail::create($userDetail);
        });
        return redirect()->route('auth.login')->with('success', __('webstring.reg_message'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('user::edit');
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
    public function destroy($id)
    {
        //
    }
}
