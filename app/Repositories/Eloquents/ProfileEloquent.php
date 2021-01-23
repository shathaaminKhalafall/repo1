<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;

use App\Models\Admin;
use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use App\Story;
use Illuminate\Support\Facades\Config;

class ProfileEloquent extends Uploader implements Repository
{

    private $model;

    public function __construct(Admin $model)
    {
        $this->model = $model;
    }

    function anyData()
    {

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

    }


    function update(array $attributes, $id = null)
    {

        // TODO: Implement update() method.

        $id = authAdmin()->id;
        $profile = $this->model->find($id);

        if (isset($attributes['name']))
            $profile->name = $attributes['name'];

        if (isset($attributes['email']))
            $profile->email = $attributes['email'];

        if (isset($attributes['phone']))
            $profile->phone = $attributes['phone'];

        if (isset($attributes['address']))
            $profile->address = $attributes['address'];

        if (isset($attributes['password']))
            $profile->password = bcrypt($attributes['password']);

        if ($profile->save())
            return response_api(true, 200, trans('app.success'), $profile);
        return response_api(false, 422, trans('app.error'));
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }

}
