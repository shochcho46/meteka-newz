<?php

namespace Modules\Auth\Http\Controllers;

use App\Mail\MyMail;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
// use Modules\User\Entities\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function login()
    {
        return view('auth::login');
    }
    public function signup()
    {
        return view('auth::signup');
    }

    public function forgetpass()
    {

        return view('auth::forgetpass');
    }
    public function checkAccount(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
        ]);
        $userData = User::where('email', $request->email)->first();

        if (empty($userData)) {
            return back()->with('fail', 'Sorry This Email address in not in out system');
        } else {
            $rand = rand(10, 10000) . Str::random(6);
            $userData->recovery_code = $rand;
            $userData->save();
            $details = [
                'code' => $rand,
            ];
            Mail::to($userData->email)->send(new MyMail($details));
            return redirect()->route('auth.loadResetPassword', $userData)->with('success', 'A code has been sent to your email address');

        }

    }

    public function loadResetPassword(User $user)
    {

        $userData = $user;

        return view('auth::resetpass', compact('userData'));
    }

    public function resetPassWord(Request $request)
    {

        $validated = $request->validate([
            'password' => 'required|confirmed',
            'code' => 'required',
        ]);

        $userDetail = User::find($request->userId);

        if ($userDetail->recovery_code == $request->code) {
            $password = Hash::make($request->password);
            $userDetail->password = $password;
            $userDetail->save();
            return redirect()->route('auth.login')->with('success', 'Password Change Successful');
        } else {
            return redirect()->route('auth.login')->with('fail', 'The Code is not Valid');
        }
    }
    public function validLogin(Request $request)
    {

        $validated = $request->validate([
            'emailormobile' => 'required',
            'password' => 'required',
        ]);

        $emailormobile = $request->emailormobile;

        $credentialsemail = array("email" => $emailormobile, "password" => $request->password);
        $credentialsmobile = array("mobile" => $emailormobile, "password" => $request->password);

        if ((Auth::attempt($credentialsemail)) || (Auth::attempt($credentialsmobile))) {

            $user = Auth::user();

            if (($user->status == 0)) {
                return back()->with('fail', 'This accout is black listed');
            }

            if (($user->role_id == 1) || ($user->role_id == 2) || ($user->role_id == 3)) {
                return redirect()->route('admin.home');
            } else {

                return back()->with('fail', 'Wrong credentials');
            }

        } else {
            return back()->with('fail', 'Wrong credentials');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
