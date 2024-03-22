<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string','min:2','max:255'],
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'is_active' => 'sometimes',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Product Name cannot be empty',
            'name.min' => 'Give least 2 characters for Product Name',
        ];
    }
}
