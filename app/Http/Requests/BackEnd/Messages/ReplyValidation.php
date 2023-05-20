<?php

namespace App\Http\Requests\BackEnd\Messages;

use Illuminate\Foundation\Http\FormRequest;

class ReplyValidation extends FormRequest
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
            'reply' => 'required|string|min:5|max:500',
        ];
    }
}
