<?php

namespace App\Http\Requests\Work;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWorkRequest extends FormRequest
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
            'main_image' => 'nullable|image',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
            'image4' => 'nullable|image',
            'name' => 'required',
            'job_description' => 'required',
            'description' => 'required',
            'small_description' => 'required|max:180',
            'price1' => 'nullable',
            'price2' => 'nullable',
            'price3' => 'nullable',
            'price4' => 'nullable',
        ];
    }
}
