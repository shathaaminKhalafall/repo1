<?php

namespace App\Models;

use App\Support\Translateable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    //
    use Translateable;

    //
    use SoftDeletes;

 protected $fillable = [
     'logo_image',
 ];

    public function translation($language = null)
    {

        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(SettingTranslation::class)->where('language', '=', $language)->first();
    }

    public function translationAll()
    {
        $language = app()->getLocale();
        return $this->hasOne(SettingTranslation::class)->where('language', '=', $language);
    }


    public function translationModel($language = null)
    {
        if ($language == null) {
            $language = app()->getLocale();
        }
        return $this->hasMany(SettingTranslation::class)->where('language', '=', $language);
    }

    public function getLogoImageAttribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }
}
