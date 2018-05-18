<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
            'branch_img' => 'image:jpg,png|max:50000',
            'desc' => 'max:400|required',
            'address' => 'max:100|required',
            'p_number' => 'digits_between:9,20|required',
            'w_hours' => 'max:300|required'
        ];
    }
}
