<?php

namespace App\Http\Requests\FrontEnd\Users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|min:3|max:255',
            'id' => 'required|int',
            'aboutMe' => 'nullable|string|min:5|max:500'
        ];
    }
}
