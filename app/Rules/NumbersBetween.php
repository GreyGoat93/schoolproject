<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NumbersBetween implements Rule
{
    private $_minvalue;
    private $_maxvalue;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($minvalue, $maxvalue)
    {
        $this->_minvalue = $minvalue; 
        $this->_maxvalue = $maxvalue;
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
        return $this->_maxvalue >= $value && $value >= $this->_minvalue;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This value should be between ' . $this->_minvalue . '-' . $this->_maxvalue;
    }
}
