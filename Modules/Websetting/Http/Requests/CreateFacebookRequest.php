<?php

namespace Modules\Websetting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateFacebookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'app_secrete_kye' => 'required',
            'appid' => 'required|numeric',
            'app_token_page' => 'required',
            'pageid' => 'required',

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
