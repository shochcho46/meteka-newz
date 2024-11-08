<?php

namespace Modules\Websetting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFooterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contact' => 'required',
            'email' => 'required|email',
            'house' => 'required',
            'road' => 'required',
            'location' => 'required',
            'footer_detail' => 'required',
            'copyright' => 'required',
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
