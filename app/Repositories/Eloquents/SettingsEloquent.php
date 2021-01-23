<?php
/**
 * Created by PhpStorm.
 * UserRequest: mohammedsobhei
 * Date: 5/2/18
 * Time: 11:43 PM
 */

namespace App\Repositories\Eloquents;

use App\Models\Setting;
use App\Models\SettingTranslation;
use App\Repositories\Interfaces\Repository;
use App\Repositories\Uploader;
use Illuminate\Support\Facades\Config;

class SettingsEloquent extends Uploader implements Repository
{

    private $model, $translation;

    public function __construct(Setting $model, SettingTranslation $translation)
    {
        $this->model = $model;
        $this->translation = $translation;
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
//        dd($attributes);
        $model = $this->model->find(1);
        if (isset($model)) {
            if (isset($attributes['logo_image'])) {
                $model->logo_image = $this->upload($attributes, 'logo_image');
                $model->save();
            }
            $languages = Config::get('languages.supported');
            foreach ($languages as $language) {
                $model->translationModel($language)->update(
                    ['header_title' => $attributes['header_title'][$language]
                    , 'header_subTitle' => $attributes['header_subTitle'][$language]
                    , 'sector_title' => $attributes['sector_title'][$language]
                    , 'about_title' => $attributes['about_title'][$language]
                    , 'about_content' => $attributes['about_content'][$language]
                    , 'investor_title' => $attributes['investor_title'][$language]
                    , 'investor_content' => $attributes['investor_content'][$language]
                    , 'team_title' => $attributes['team_title'][$language]
                    , 'project_title' => $attributes['project_title'][$language]
                    , 'footer_content' => $attributes['footer_content'][$language]
                    , 'address' => $attributes['address'][$language]
                    , 'terms' => $attributes['terms'][$language]
                    , 'policy' => $attributes['policy'][$language]
//                    , 'facebook_url' => $attributes['facebook_url'][$language]
//                    , 'instagram_url' => $attributes['instagram_url'][$language]
//                    , 'twitter_url' => $attributes['twitter_url'][$language]
//                    , 'linkenin_url' => $attributes['linkenin_url'][$language]
//                    , 'phone_1' => $attributes['phone_1'][$language]
//                    , 'phone_2' => $attributes['phone_2'][$language]
//                    , 'email' => $attributes['email'][$language]
                    ]);
            }

            return response_api(true, 200, __('app.success'), $model);
        }
        return response_api(false, 422, __('app.error'));
    }

    function updateContact(array $attributes, $id = null)
    {
        // TODO: Implement update() method.
//        dd($attributes);
        $model = $this->model->find(1);
        if (isset($model)) {

            $languages = Config::get('languages.supported');
            foreach ($languages as $language) {
                $model->translationModel($language)->update(
                    [
                      'youtube_url' => $attributes['youtube_url'][$language]
                    , 'facebook_url' => $attributes['facebook_url'][$language]
                    , 'instagram_url' => $attributes['instagram_url'][$language]
                    , 'twitter_url' => $attributes['twitter_url'][$language]
                    , 'linkenin_url' => $attributes['linkenin_url'][$language]
                    , 'phone_1' => $attributes['phone_1'][$language]
                    , 'phone_2' => $attributes['phone_2'][$language]
                    , 'email' => $attributes['email'][$language]
                    ]);
            }

            return response_api(true, 200, __('app.success'), $model);
        }
        return response_api(false, 422, __('app.error'));
    }

    function delete($id)
    {
        // TODO: Implement delete() method.
    }

}
