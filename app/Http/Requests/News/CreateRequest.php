<?php

declare(strict_types=1);

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:3', 'max:200'],
            'author' => ['required', 'string'],
            'status' => ['required', 'string', 'min:5', 'max:7'],
            'image' => ['nullable', 'image', 'mimes:png,jpg, jpeg'],
            'description' => ['required', 'string'],
        ];
    }
}
