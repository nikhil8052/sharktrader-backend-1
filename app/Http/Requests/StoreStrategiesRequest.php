<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\XSession;

class StoreStrategiesRequest extends FormRequest
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
        $wallet = Auth::user()->wallet;

        return [
            'user_id'    => ['required', 'numeric'],
            'name'       => ['string'],
            'fox'        => ['required'],
            'percentage' => ['numeric', 'required'],
            'amount'     => ['required', 'numeric', 'min:10', 'lte:'.$wallet->amount],
            'earnings'   => ['numeric', 'required'],
            'cycle'      => ['numeric', 'required'],
            'status'     => ['numeric'],
        ];
    }
    public function messages()
    {
        // use trans instead on Lang
        return [
            'fox.required' => 'The Spider Web field is required.'
        ];
    }
}
