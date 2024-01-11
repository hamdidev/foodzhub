<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
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
            'image' => ['nullable', 'image', 'max:3000'],
            'offer' => ['nullable', 'string', 'max:50'],
            'title' => ['required', 'max:255', 'string'],
            'subtitle' => ['required', 'max:255', 'string'],
            'short_desc' => ['required', 'max:255', 'string'],
            'button_link' => ['nullable', 'max:255'],
            'status' => ['boolean'],
        ];
    }
}
