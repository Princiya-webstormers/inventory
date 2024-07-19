<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
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
            'name'=>['sometimes', 'string'],
            'price'=>['sometimes', 'numeric', 'min:0'],
            'description'=>['sometimes', 'string'],
            'quantity'=>['sometimes', 'numeric'],
            'low_quantity'=>['required', 'numeric'],
            'old_quantity'=>['sometimes', 'numeric'],
            'new_quantity'=>['sometimes', 'numeric'],
            'action'=>['sometimes', 'string'],
        ];
    }
}
