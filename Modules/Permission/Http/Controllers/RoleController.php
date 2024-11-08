<?php

namespace Modules\Permission\Http\Controllers;

use App\Helper\Geturl;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permission\Entities\Role;

// use Carbon\Carbon;

class RoleController extends Controller
{

    private $headtitle;
    public function __construct()
    {
        $geturl = new Geturl();

        $this->headtitle['sub_title'] = __('webstring.permission');
        $this->headtitle['page_title'] = __('webstring.permission_role');
        $this->headtitle['third_title'] = __('webstring.permission_role');
        $this->headtitle['prefix'] = $geturl->GetUrlPrefix();

    }

    public function index()
    {
        $title = $this->headtitle;
        $theading = __('webstring.permission_role_table');
        $data = Role::all();
        return view('permission::role.list', compact('data', 'title', 'theading'));
    }

    public function create()
    {
        $title = $this->headtitle;
        return view('permission::role.create', compact('title'));
    }

    public function store(Request $request)
    {
        $getdata = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

        Role::create($getdata);
        return redirect()->route('role.index')->with('success', __('webstring.save_message'));
    }

    public function show($id)
    {
        return view('permission::show');
    }

    public function edit(Role $role)
    {
        $title = $this->headtitle;
        $data = $role;
        return view('permission::role.edit', compact('title', 'data'));
    }

    public function update(Request $request, Role $role)
    {
        $getdata = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
        $role->update($getdata);
        return redirect()->route('role.index')->with('update', __('webstring.update_message'));
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index')->with('fail', __('webstring.delete_message'));
    }
}
