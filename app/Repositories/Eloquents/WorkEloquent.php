<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;


use App\Models\Admin;
use App\Models\Service;
use App\Models\Work;
use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Role;

class WorkEloquent extends Uploader implements Repository
{
    private $model;

    public function __construct(Work $model)
    {
        $this->model = $model;
    }

    function anyData()
    {

        $data = $this->model->orderByDesc('updated_at');

        return datatables()->of($data)
            ->editColumn('image', function ($item) {

                if (isset($item->main_image))
                    return '<img src="' . $item->main_image . '" width="80px">';
            })
            ->addColumn('action', function ($item) {
                $edit="";

                    $edit = ' <a href="' . url(admin_works_url() . '/work-edit/' . $item->id) . '" class="btn btn-circle btn-icon-only purple edit">
                                        <i class="fa fa-edit"></i>
                                    </a>';


                $delete="";
                    $delete = '   <a href="' . url(admin_works_url() . '/work/' . $item->id) . '" class="btn btn-circle btn-icon-only red delete">
                                        <i class="fa fa-trash"></i>
                                    </a>';
//

                if(!isset($edit)&& !isset($delete) )
                    return "";

                return $edit .  $delete ;

            })->addIndexColumn()
            ->rawColumns(['image' , 'action'])->toJson();
    }

    function getAll(array $attributes)
    {
        // TODO: Implement getAll() method.
        $data = $this->model->all();
        if (request()->segment(1) == 'api') {
            return response_api(true, 200, null, $data);
        }
        return $data;
    }

    function getById($id)
    {
        // TODO: Implement getById() method.
        return $this->model->find($id);
    }

    function create(array $attributes)
    {
        // TODO: Implement create() method.
        $model = new Work([
            'main_image' => $this->upload($attributes, 'main_image'),
            'image1' => $this->upload($attributes, 'image1'),
            'image2' => $this->upload($attributes, 'image2'),
            'image3' => $this->upload($attributes, 'image3'),
            'image4' => $this->upload($attributes, 'image4'),
            'name' => $attributes['name'],
            'small_description' => $attributes['small_description'],
            'job_description' => $attributes['job_description'],
            'description' => $attributes['description'],
            'price1' => $attributes['price1'],
            'price2' => $attributes['price2'],
            'price3' => $attributes['price3'],
            'price4' => $attributes['price4'],
        ]);
        if ($model->save()) {
            return response_api(true, 200, __('app.success'), $model);
        }
        return response_api(false, 422, __('app.error'));


    }

    function update(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
        $model = $this->model->find($id);
        if (isset($model)) {
            if (isset($attributes['main_image'])) {
                $model->main_image = $this->upload($attributes, 'main_image');
            }
            if (isset($attributes['image1'])) {
                $model->image1 = $this->upload($attributes, 'image1');
            }
            if (isset($attributes['image2'])) {
                $model->image2 = $this->upload($attributes, 'image2');
            }
            if (isset($attributes['image3'])) {
                $model->image3 = $this->upload($attributes, 'image3');
            }
            if (isset($attributes['image4'])) {
                $model->image4 = $this->upload($attributes, 'image4');
            }


            if (isset($attributes['name'])) {
                $model->name = $attributes['name'];
            }
            if (isset($attributes['small_description'])) {
                $model->small_description = $attributes['small_description'];
            }
            if (isset($attributes['job_description'])) {
                $model->job_description = $attributes['job_description'];
            }
            if (isset($attributes['description'])) {
                $model->description = $attributes['description'];
            }
            if (isset($attributes['price1'])) {
                $model->price1 = $attributes['price1'];
            }
            if (isset($attributes['price2'])) {
                $model->price2 = $attributes['price2'];
            }
            if (isset($attributes['price3'])) {
                $model->price3 = $attributes['price3'];
            }
            if (isset($attributes['price4'])) {
                $model->price4 = $attributes['price4'];
            }
            if ($model->save()) {
                return response_api(true, 200, __('app.success'), $model);
            }
        }
        return response_api(false, 422, __('app.error'));
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
        $model = $this->model->find($id);

        if (isset($model) && $model->delete())
            return response_api(true, 200, __('app.success'), []);
        return response_api(false, 422, __('app.error'), []);

    }

}
