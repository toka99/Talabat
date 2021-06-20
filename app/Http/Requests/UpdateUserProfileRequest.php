<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
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
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email'    => 'required|email|unique:users,email,'.$this->user->id,
            'gender' => 'required',
            'date_of_birth' => 'required',
            'mobile_number' => 'required|digits:12|numeric|regex:/(201)[0-9]{9}/|unique:users,mobile_number,'.$this->user->id,

        ];
    }
}


