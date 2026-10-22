<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
            'content' => 'required|string|max:20',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Todoを入力してください',
            'content.string' => 'Todoを文字列で入力してください',
            'content.max' => 'Todoを20文字以内で入力してください',

            'category_id.required' => 'カテゴリを選択してください',
            'category_id.exists' => '正しいカテゴリを選択してください',
        ];
    }
}
