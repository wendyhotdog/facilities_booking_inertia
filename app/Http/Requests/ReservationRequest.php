<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'facility_id' => 'required|exists:facilities,id',
            'user_id' => 'required|exists:users,id',
            'purpose' => 'required',
            'status' => 'required',
            'remarks' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'reservation_date' => 'required',
        ];
    }
}
