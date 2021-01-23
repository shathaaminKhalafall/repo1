<?php

namespace App\Http\Requests\Work;

use Illuminate\Foundation\Http\FormRequest;

class CreateWorkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'main_image' => 'required|image',
            'image1' => 'required|image',
            'image2' => 'required|image',
            'image3' => 'required|image',
            'image4' => 'required|image',
            'name' => 'required',
            'job_description' => 'required',
            'description' => 'required',
            'small_description' => 'required|max:180',
            'price1' => 'required',
            'price2' => 'required',
            'price3' => 'required',
            'price4' => 'required',
        ];
    }
}
