<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\Admin;
use App\Repositories\Eloquents\AdminEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private $admin;

    public function __construct(AdminEloquent $admin)
    {
        $this->admin = $admin;
    }

    public function index()
    {
        return view(admin_vw() . '.admins.index');
    }

    public function create()
    {
        return $this->admin->modal_create();
    }

    public function edit($id)
    {
        return $this->admin->modal_update($id);

    }

    public function anyData()
    {
        return $this->admin->anyData();
    }

    public function view($id)
    {
        $admin = Admin::find($id);
        if(isset($admin)) {
            $data = [
                'main_title' => 'admins management',
                'icon' => 'fa fa-users',
                'admin' => $admin,
            ];
            return view(admin_admins_vw() . '.view', $data);
        }
        abort(401);
    }


    public function store(CreateAdminRequest $request)
    {
        return $this->admin->create($request->all());
    }

    public function update(UpdateAdminRequest $request, $id)
    {
        return $this->admin->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->admin->delete($id);
    }

}
