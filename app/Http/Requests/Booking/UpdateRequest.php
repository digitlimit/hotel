<?php

namespace App\Http\Requests\Booking;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Booked;

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
            'start_date.date_format'=>'Invalid date format. Date must be in YYYY-MM-DD',
            'start_date.after'=>'Please select current or future date',
            'end_date.date_format'=>'Invalid date format. Date must be in YYYY-MM-DD',
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
            'room_id'           =>  [
                'required', 'numeric', 'exists:rooms,id',
                // new Booked($this->start_date, $this->end_date, $booking_id=$this->id)
            ],
            'customer_id'       => 'Customer',
            'start_date'        => 'Start Date',
            'end_date'          => 'End Date',
            'customer_fullname' => 'Customer Fullname',
            'customer_email'    => 'Customer email',
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
            'room_id'           => 'required|numeric|exists:rooms,id',
            'user_id'           => 'nullable|numeric|exists:users,id',
            'start_date'        => 'required|date|date_format:Y-m-d|after:yesterday',
            'end_date'          => 'required|date|date_format:Y-m-d|after:start_date',
            'customer_fullname' => 'required|string',
            'customer_email'    => 'required|email'
        ];
    }
}
