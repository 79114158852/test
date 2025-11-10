<?php

namespace App\Http\API\Requests\Guide;

class ListRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * @return array<mixed>
     */
    public function rules(): array
    {
        return [
            'min_experience' => 'nullable|integer|min:0',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
