<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Length;
use App\Rules\NumbersBetween;

class ClassroomRequest extends FormRequest
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
    public function rules()
    {
        return [
            'grade' => ['required','integer', new NumbersBetween(1, 12)],
            'branch' => ['required', 'regex:/[a-zA-Z]+/', new Length(1,2)],
            'quota' => ['required','integer'],
        ];
    }
}
