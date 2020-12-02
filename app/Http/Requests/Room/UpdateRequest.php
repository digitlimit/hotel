<?php

namespace App\Http\Requests\Room;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name.unique' => 'Room name already exists',
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
            'name'              => 'Room name',
            'hotel_id'          => 'Hotel',
            'room_type'         => 'Room Type',
            'image'             => 'Image'
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
            'hotel_id'          => 'nullable|numeric|exists:hotels,id',
            'room_type_id'      => 'required|numeric|exists:room_types,id',
            'image'             => 'nullable|mimetypes:image/gif,image/jpeg,image/png',

            'name'      => [
                'required', 'string',
                Rule::unique('rooms')->ignore($this->route('room'), 'id'),
            ],
        ];
    }
}
