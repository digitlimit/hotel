<?php

namespace App\Http\Requests\Hotel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * Set custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
        ];
    }

    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'image'           => 'Hotel Image',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required|string',//TODO: validate hotel name
            'address'           => 'required|string', //TODO: validate US address
            'city'              => 'required|string', //TODO:
            'state'             => 'required|exists:states,name',
            'country'           => 'required|exists:countries,name',
            'zip_code'          => 'nullable|string', //TODO:
            'email'             => 'required|email',
            'image'             => 'nullable|mimetypes:image/gif,image/jpeg,image/png'
        ];
    }
}
