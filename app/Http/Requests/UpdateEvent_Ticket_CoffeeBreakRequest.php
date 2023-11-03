<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvent_Ticket_CoffeeBreakRequest extends FormRequest
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
            'eventID' => [
                'integer'
            ],
            'event_name' => [
                'string', 'max:255'
            ],
            'ticket_name' => [
                'string', 'max:255'
            ],
            'coffee_break_id' => [
                'integer'
            ]
        ];
    }
}
