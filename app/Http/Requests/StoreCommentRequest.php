<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => ['required', 'string', 'min:1', 'max:10000'],
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'O comentário não pode estar vazio.',
            'content.max' => 'O comentário não pode ter mais de 10.000 caracteres.',
        ];
    }
}
