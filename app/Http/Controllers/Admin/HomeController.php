<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private  $userEloquent;

    public function __construct()
//    public function __construct(UserEloquent $userEloquent)
    {
        $this->middleware('auth:admin');
//        $this->userEloquent=$userEloquent;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admins = Admin::count();
        $works = Work::count();



        return view(admin_vw() . '.home' , compact(
            'admins',
            'works'
        ));
    }
}
