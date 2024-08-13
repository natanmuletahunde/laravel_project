<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TimeValidation implements Rule
{
    public function passes($attribute, $value)
    {
        // Define your time validation logic here
        return preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $value);
    }

    public function message()
    {
        return 'The :attribute is not a valid time.';
    }
}
