<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'id' => 'required|unique:students|integer',
            'name' => 'required|max:50|alpha',
            'email' => 'required|unique:students|max:255||email',
            'phone' => 'required|unique:students|digits:11',
            'image' => 'image|mimes:png,jpg',
            'department_id' => 'min:1|max:255|integer'
        ];
    }

    public function messages(){
        return[
            'id.required' => 'please enter the code..',
            'name.required' => 'please enter the name..',
            'phone.required' => 'please enter the phone..',
            'email.required' => 'please enter the email..',

            'id.unique' => 'please enter other the code..',
            'phone.unique' => 'please enter other the phone..',
            'email.unique' => 'please enter othr the email..'
        ];
    }
}