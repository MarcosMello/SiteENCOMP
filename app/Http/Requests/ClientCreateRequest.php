<?php

namespace App\Http\Requests;

use App\Models\Address;
use Illuminate\Foundation\Http\FormRequest;

class ClientCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        $clientRules = [
            'name' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', 'unique:clients,email'
            ],
            'cpf' => [
                'required', 'unique:clients,cpf', 'string', 'digits:11'
            ],
            'phone' => [
                'required', 'min:6'
            ]
        ];
        $rules = array_merge($clientRules, Address::rules());
        return $rules;
    }
}
