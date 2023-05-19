<?php

namespace App\Http\Requests\BackEnd\Pages;

use Illuminate\Foundation\Http\FormRequest;

class StoreValidation extends FormRequest
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
            'name'=>'required|max:255',
            'meta_keywords'=>'max:255',
            'meta_description'=>'max:255',
            'description'=>'required|min:10',
        ];
    }
}
