<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'teacher_img' => 'image:jpg,png|max:50000',
            'name' => 'max:100|required',
            'password' => 'max:100|required',
            'l_name' => 'max:100|required',
            'email' => 'email|required',
            'p_number' => 'digits_between:9,20|required'
        ];
    }
}
