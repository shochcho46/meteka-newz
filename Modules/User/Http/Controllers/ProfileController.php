<?php

namespace Modules\User\Http\Controllers;

use App\Helper\Getdata;
use App\Helper\Geturl;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\Udetail;
use Modules\User\Entities\User;
use Modules\User\Http\Requests\UpdateUserdetailRequest;
use Modules\User\Http\Requests\UpdateUserloginRequest;
use Modules\User\Http\Requests\UpdateUserPasswordRequest;

class ProfileController extends Controller
{

    //test code

    public function __construct()
    {

        $geturl = new Geturl();
        $this->headtitle['sub_title'] = __('webstring.profile');
        $this->headtitle['page_title'] = __('webstring.profile');

        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();

    }
    //test code

    public function create()
    {
        $title['sub_title'] = __('webstring.profile');
        $title['page_title'] = __('webstring.profile');

        $title = $this->headtitle;
        $getdata = new Getdata();

        $dbdata['country'] = $getdata->GetAllCountry();
        $user = Auth::user();
        $data = User::with('udtail')->find($user->id);

        // To Use the common coutry blade
        $data->country_id = $data->udtail->country_id;
        // To Use the common coutry blade

        return view('user::profile.profile', compact('data', 'title', 'dbdata'));
    }

    public function store(Request $request)
    {
        //
    }

    public function passwordUpdate(UpdateUserPasswordRequest $request, User $user)
    {
        $getdata = $request->validated();
        $currentPassword = $user->password;
        if (Hash::check($getdata['oldpassword'], $currentPassword)) {
            $password['password'] = Hash::make($request->password);
            $user->update($password);
            return redirect()->route('profile.create')->with('success', __('webstring.update_message'));
        } else {
            return redirect()->route('profile.create')->with('fail', __('webstring.fail_message'));
        }

    }

    public function loginInfoUpdate(UpdateUserloginRequest $request, User $user)
    {
        $getdata = $request->validated();

        $currentPassword = $user->password;

        if (Hash::check($request->password, $currentPassword)) {
            $getdata['password'] = Hash::make($request->password);
            $user->update($getdata);
            return redirect()->route('profile.create')->with('success', __('webstring.update_message'));
        } else {
            return redirect()->route('profile.create')->with('fail', __('webstring.fail_message'));
        }
    }

    public function updatepersonal(UpdateUserdetailRequest $request, Udetail $udetail)
    {

        $getdata = $request->validated();

        $getdata['age'] = $request->age;
        $getdata['address'] = $request->address;
        $getdata['zip'] = $request->zip;
        $getdata['idtype'] = $request->idtype;
        $getdata['idnumber'] = $request->idnumber;
        $udetail->update($getdata);
        return redirect()->route('profile.create')->with('success', __('webstring.update_message'));
    }

    public function profilePicUpload(Request $request, Udetail $udetail)
    {
        if ($request->hasFile('profilepicupload')) {
            $this->validateRequestLogo();
            $udetail->clearMediaCollection('profilepic');
            $udetail->addMedia($request->profilepicupload) ->toMediaCollection('profilepic');

        }
        return redirect()->route('profile.create')->with('success', __('webstring.save_message'));
    }

    public function documentPicUpload(Request $request, Udetail $udetail)
    {
        if ($request->hasFile('docupicupload')) {
            $this->validateRequestDocument();
            $udetail->clearMediaCollection('userdocument');
            $udetail->addMedia($request->docupicupload) ->toMediaCollection('userdocument');

        }
        return redirect()->route('profile.create')->with('success', __('webstring.save_message'));
    }

    public function validateRequestLogo()
    {
        if (request()->hasFile('profilepicupload')) {

            $data = request()->validate([
                'profilepicupload.*' => 'max:6048|dimensions:max_width=1920,max_height=1080',
            ]);

        }
        return $data;

    }

    public function validateRequestDocument()
    {
        if (request()->hasFile('docupicupload')) {

            $data = request()->validate([
                'docupicupload.*' => 'max:6048|dimensions:max_width=1920,max_height=1080',
            ]);

        }
        return $data;

    }

}
