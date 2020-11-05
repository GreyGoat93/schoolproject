<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Length implements Rule
{
    private $_minlength;
    private $_maxlength;
    private $_length;
    /**
     * Create a new rule instance.
     * @param int $minlength
     * @param int $maxlength
     * @return void
     */
    public function __construct($minlength, $maxlength)
    {
        $this->_minlength = $minlength;
        $this->_maxlength = $maxlength;
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
        $this->_length = strlen($value);
        if($this->_maxlength >= $this->_length && $this->_length >= $this->_minlength){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This text\' should have digits between ' . $this->_minlength . '-' . $this->_maxlength . '.';
    }
}
