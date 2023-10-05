<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'full_name' => 'required|string|min:3|max:50',
            'company' => 'string|min:3|max:30',
            'phone_number' => 'required|string',
            'email' => 'required|string',
            'birth_date' => 'string',
            'image_url' => '',
        ];
    }
}
