<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupDonorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'fullname'  => 'required|string|max:60',
            'username'  => 'required|string|unique:users,username',
            'password'  => 'required|string|min:6',
            'age'       => 'required|integer|min:18',
            'address'   => 'required|string|max:60',
            'mobile'    => 'required|string|unique:userinfos,mobile',
            'bloodtype' => 'required|string|max:10',
            //
        ];
    }
}
