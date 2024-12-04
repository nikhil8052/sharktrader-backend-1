<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TRC20WalletAddressValidationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $pattern = '/^(?=.*[a-zA-Z0-9_$])[\w$]{40,}$/'; // Adjust this pattern as necessary

        return preg_match($pattern, $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid TRC20 wallet address.';
    }
}
