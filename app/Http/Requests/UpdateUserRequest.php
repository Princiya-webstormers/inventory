<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255'],
            'password' => ['sometimes', 'string', 'min:8'],
            'dob' => ['sometimes', 'date'],
            'address' => ['sometimes', 'regex:/(^[-0-9A-Za-z.,\/ ]+$)/'],
            'city' => ['sometimes', 'string'],
            'state' => ['sometimes', 'string'],
            'pincode' => ['sometimes', 'string'],
            'username' => ['sometimes', 'string'],
            'mobile' => ['sometimes', 'digits:10'],
            'type'=>['sometimes'],
            'role'=>['nullable'],
        ];
    }
}
