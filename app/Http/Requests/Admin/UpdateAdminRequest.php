<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
        $str = $_SERVER['REQUEST_URI'];
        preg_match_all('!\d+!', $str, $user_id);

        $user_id =(int) $user_id[0][0];

        return [
            'name' => 'required|string',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i|unique:admins,email,'. $user_id,
            'password' => 'nullable|string|min:6',
            'phone' => 'required',
            'address' => 'required|string',
        ];
    }
}
