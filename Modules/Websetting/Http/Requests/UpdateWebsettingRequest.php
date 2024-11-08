<?php

namespace Modules\Websetting\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebsettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logotext' => 'required',
            'language_id' => 'required',
            'font_id' => 'required',
            'country_id' => 'required',
            'timezone_id' => 'required',
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
