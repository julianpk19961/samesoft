<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class peopleDataRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'document' => 'required|unique:people_data, document'
        ];
    }

    public function messages()
    {
        return [
            'document.required' => 'El :attribute es obligatorio'
        ];
    }

    public function attributes()
    {
        return [
            'document' => 'Número de documento'
        ];
    }
}
