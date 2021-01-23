<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Repositories\Eloquents\ProfileEloquent;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $profile;

    public function __construct(ProfileEloquent $profileEloquent)
    {
        $this->profile = $profileEloquent;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
            $id = authAdmin()->id;
        $profile = $this->profile->getById($id);
        $data = [
            'back_url' => url(admin_admins_url()),
            'profile' => $profile
        ];
        return view(admin_admins_vw() . '.profile', $data);
    }

    // edit admin company page
    public function update(UpdateAdminRequest $request, $id)
    {
        return $this->profile->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
