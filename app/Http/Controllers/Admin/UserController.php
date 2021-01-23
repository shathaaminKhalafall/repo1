<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use App\Repositories\Eloquents\UserEloquent;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    private $user;

    public function __construct(UserEloquent $userEloquent)
    {
        $this->user = $userEloquent;
    }

    public function index()
    {
        $data = [
            'main_title' => 'users',
            'icon' => 'fa fa-users',
            'countries' => Country::all(),
        ];
        return view(admin_users_vw() . '.index', $data);
    }

    public function anyData()
    {
        return $this->user->anyData();
    }


    public function userActive(Request $request)
    {
        return $this->user->userActive($request->only('user_id'));
    }


    public function view($id)
    {
        $user=User::find($id);
        if(isset($user)) {
            $data = [
                'main_title' => 'users',
                'icon' => 'fa fa-users',
                'user' => $user,
            ];
            return view(admin_users_vw() . '.view', $data);
        }
        abort(401);
    }

}
