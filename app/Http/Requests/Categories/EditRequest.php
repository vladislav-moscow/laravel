<?php

namespace App\Http\Requests\Categories;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'image' => ['nullable', 'image', 'mimes:png,jpg, jpeg'],
            'description' => ['required', 'string'],
            'is_active' => ['nullable', 'tinyint'],
        ];
    }
    public function messages(): array
    {
        return parent::messages(); // TODO: Change the autogenerated stub
    }

    public function attributes(): array
    {
        return parent::attributes(); // TODO: Change the autogenerated stub
    }
}