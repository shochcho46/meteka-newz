<?php

namespace Modules\User\Http\Controllers;

use App\Helper\Geturl;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Permission\Entities\Role;
use Modules\User\Entities\Udetail;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\CreateUserWithTypeRequest;
use Modules\User\Http\Requests\UpdateAdminInfoRequest;
use Modules\User\Http\Requests\UpdateAdminPasswordRequest;
use Modules\Websetting\Entities\Websetting;

class CreateUserController extends Controller
{
    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();

        $this->headtitle['sub_title'] = __('webstring.user');
        $this->headtitle['page_title'] = __('webstring.user');
        $this->headtitle['third_title'] = __('webstring.user');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();

    }
    public function index()
    {
        $title = $this->headtitle;
        $theading = __('webstring.admin_list');
        $data = User::where('role_id', '!=', 4)->where('role_id', '!=', 1)->with('udtail')->get();
        return view('user::user.adminlist', compact('data', 'title', 'theading'));

    }

    public function normalindex()
    {
        $title = $this->headtitle;
        $theading = __('webstring.normal_list');
        $data = User::where('role_id', 4)->with('udtail')->get();
        return view('user::normal.normallist', compact('data', 'title', 'theading'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {

        $title = $this->headtitle;
        $data['role'] = Role::where('id', '!=', 1)->get();
        return view('user::user.create', compact('title', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateUserWithTypeRequest $request)
    {
        $getdata = $request->validated();

        $getdata['password'] = Hash::make($request->password);
        $getdata['slug'] = date('YmdHis');

        DB::transaction(function () use ($getdata, $request) {
            $webconfigData = Websetting::first();
            $userid = User::create($getdata);
            $userDetail['user_id'] = $userid->id;
            $userDetail['name'] = $request->name;
            $userDetail['country_id'] = $webconfigData->country_id;
            $userDetail['imgloc'] = 'storage/profile/profile.jpg';
            $userDetail['idimgloc'] = 'storage/document/docupic.jpg';
            Udetail::create($userDetail);
        });
        if ($request->role_id == 4) {
            return redirect()->route('createuser.normalindex')->with('success', __('webstring.reg_message'));
        } else {
            return redirect()->route('createuser.adminindex')->with('success', __('webstring.reg_message'));
        }

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
    public function edit(User $createuser)
    {
        $title = $this->headtitle;
        $data = $createuser;
        $role = Role::all();
        return view('user::user.edit', compact('title', 'data'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateAdminInfoRequest $request, User $createuser)
    {
        $getdata = $request->validated();

        $createuser->update($getdata);
        return redirect()->route('createuser.adminindex')->with('update', __('webstring.update_message'));
    }

    public function passWordUpdate(UpdateAdminPasswordRequest $request, User $createuser)
    {
        $getdata = $request->validated();
        $getdata['password'] = Hash::make($request->password);
        $createuser->update($getdata);
        return redirect()->route('createuser.adminindex')->with('update', __('webstring.update_message'));
    }

    public function status($id, $field, $value)
    {
        User::where("id", $id)->update([$field => $value]);
        return redirect()->back()->with('update', __('webstring.update_message'));
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
