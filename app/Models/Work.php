<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Work extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [ 'name' ,'job_description' ,'small_description' ,'description' ,'main_image','image1' ,'price1' ,'image2','price2' ,'image3' ,'price3','image4' ,'price4'];

    public function getMainImageAttribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }
    public function getImage1Attribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }
    public function getImage2Attribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }
    public function getImage3Attribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }
    public function getImage4Attribute($value)
    {
        if (isset($value))
            return url('assets/upload') . '/' . $value;
    }
}
