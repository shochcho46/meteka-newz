<?php

namespace Modules\Advertisement\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdvertiseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'add_type' => 'required',
            'picadvertise.*' => 'required',
            'link' => '',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
