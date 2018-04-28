<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RoomCapacityRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $roomCapacity;
    public function __construct($roomCapacity)
    {
        $this->roomCapacity=$roomCapacity;
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
        return $value<=$this->roomCapacity;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ' your Accompany Number is greater than Room Capacity.';
    }
}
