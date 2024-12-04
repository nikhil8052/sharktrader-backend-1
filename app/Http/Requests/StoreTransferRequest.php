<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreTransferRequest extends FormRequest
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
            'amount' => ['numeric', 'required', 'min:10', 'lte:'.$wallet->amount],
            'receiverCode' => ['required'],
            'verificationCode'  => ['required'],
        ];
    }
}
