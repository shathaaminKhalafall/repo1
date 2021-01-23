<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Work\CreateWorkRequest;
use App\Http\Requests\Work\UpdateWorkRequest;
use App\Repositories\Eloquents\WorkEloquent;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    private $work;

    public function __construct(WorkEloquent $work)
    {
        $this->work = $work;
    }

    public function index()
    {
        return view(admin_works_vw() . '.index');
    }

    public function create()
    {
        return view(admin_works_vw() . '.create');
    }

    public function edit($id)
    {
        $work = $this->work->getById($id);
        $data = [
            'work' => $work
        ];
        return view(admin_works_vw() . '.edit', $data);
    }

    public function anyData()
    {
        return $this->work->anyData();
    }


    public function store(CreateWorkRequest $request)
    {
        return $this->work->create($request->all());
    }

    public function update(UpdateWorkRequest $request, $id)
    {
        return $this->work->update($request->all(), $id);
    }

    public function delete($id)
    {
        return $this->work->delete($id);
    }

}
