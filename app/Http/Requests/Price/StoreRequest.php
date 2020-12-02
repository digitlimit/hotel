<?php

namespace App\Http\Requests\Price;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'room_type_id.unique' => 'Room Type already exists in Prices',
            'room_type_id.exists' => 'Room Type does not exists',
            'currency.in'         => 'Currency MUST be USD'
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
            'room_type_id'      => 'Room Type',
            'amount'            => 'Amount',
            'currency'          => 'Currency'
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
            'room_type_id'      => 'required|numeric|exists:room_types,id|unique:prices,room_type_id',
            'amount'            => 'required|numeric',
            'currency'          => ['nullable', Rule::in(['USD'])],
        ];
    }
}
