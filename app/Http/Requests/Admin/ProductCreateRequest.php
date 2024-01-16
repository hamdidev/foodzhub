<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'thumbnail_img' => ['required', 'image', 'max:3000'],
            'name' => ['required', 'max:255'],
            'category' => ['required', 'integer'],
            'price' => ['required', 'numeric'],
            'offer_price' => ['nullable', 'numeric'],
            'short_desc' => ['required', 'max:500'],
            'long_desc' => ['required'],
            'sku' => ['nullable', 'max:255'],
            'seo_title' => ['nullable', 'max:255'],
            'seo_desc' => ['nullable', 'max:255'],
            "show_at_home" => ['boolean'],
            "status" => ['required', 'boolean'],
        ];
    }
}
