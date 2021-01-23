<?php

namespace App\Http\Requests\Site\User;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
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
            //
            'dob' => 'required',
            'gender' => 'required|in:male,female',
            'country_id' => 'required',
            'religion_id' => 'required',
            'phone' => 'required',
            'education' => 'required',
            'interests.*' => 'required|exists:interests,id',
            'hobbies.*' => 'required|exists:hobbies,id',
        ];
    }
}
