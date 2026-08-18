<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Wajib true agar diizinkan mengubah data
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'tier' => 'nullable|in:Silver,Gold,Premium',
            'package_category' => 'required|string',
            'event_category' => 'required|string',
            'main_menu' => 'required|string',
            'side_menu' => 'nullable|string',
            'includes' => 'nullable|string',
            'allergen_info' => 'nullable|string',
            'packaging_type' => 'nullable|string',
            'min_order' => 'required|numeric|min:1',
            'price' => 'required|numeric|min:0',
            'daily_capacity' => 'nullable|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_bestseller' => 'nullable|boolean',
        ];
    }
}