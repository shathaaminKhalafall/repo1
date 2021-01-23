<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SettingTranslation extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['language', 'header_title', 'header_subTitle','about_title', 'about_content',
        'investor_title', 'investor_content', 'team_title', 'project_title', 'footer_content' , 'facebook_url',
        'instagram_url', 'twitter_url', 'linkenin_url', 'phone_1', 'phone_2', 'address', 'email', 'terms', 'policy'];

    public function Setting()
    {
        return $this->belongsTo(Setting::class, 'setting_id');
    }
}
