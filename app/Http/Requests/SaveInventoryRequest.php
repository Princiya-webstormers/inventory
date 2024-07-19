<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveInventoryRequest extends FormRequest
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
            'name'=>['required', 'string'],
            'price'=>['required', 'numeric', 'min:0'],
            'description'=>['required', 'string'],
            'quantity'=>['required', 'numeric'],
            'low_quantity'=>['required', 'numeric'],
            'old_quantity'=>['sometimes', 'numeric'],
            'new_quantity'=>['sometimes', 'numeric'],
            'action'=>['sometimes', 'string'],
        ];
    }
}
