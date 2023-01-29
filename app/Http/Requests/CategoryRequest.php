<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories,name,',
            'slug' => 'required|unique:categories,slug,',
            'parent_id' => 'nullable|exists:categories,id',
            'is_video' => 'required|boolean',
            'is_active' => 'required|boolean',
        ];
    }
}
