<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class APIStoreDepositRequest extends FormRequest
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
            'deposit_id' => ['nullable', 'numeric'],
            'address_in' => ['nullable'],
            'value_coin' => ['numeric', 'nullable'],
            'coin'       => ['nullable'],
        ];
    }
}
