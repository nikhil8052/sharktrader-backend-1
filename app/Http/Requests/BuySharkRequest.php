<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuySharkRequest extends FormRequest
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
            'shark_id' => ['integer', 'required'],
            'one_time_password' => ['integer', 'required'],
            'cost'     => ['numeric', 'required'],
            'duration' => ['integer', 'required'],
        ];
    }
}
