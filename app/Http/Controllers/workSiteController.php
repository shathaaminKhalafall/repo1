<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Work;
use Illuminate\Http\Request;

class workSiteController extends Controller
{
    public function index()
    {
        $works = Work::all();
        return view(site_work_vw().'.index' , compact('works'));
    }
    public function show($id)
    {
        $work = Work::find($id);
        return view(site_work_vw().'.show' , compact('work'));
    }
}
