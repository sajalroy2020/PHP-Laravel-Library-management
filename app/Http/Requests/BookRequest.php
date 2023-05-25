<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        $rules = [
            'title' => ['required', Rule::unique('books')->ignore($this->route('id'))],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'description' => ['required'],
            'author' => ['required'],
            'book_image' => ['required', File::types(['jpg','png','jpeg','svg'])],
        ];
        return $rules;
    }
}
