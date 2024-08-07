<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'sub_title' => ['nullable', 'string', 'max:255'],
            'slug' => ['nullable'],
            'date_line' => ['nullable', 'string'],
            'reporter_id' => ['nullable', 'exists:reporters,id'],
            'guest_id' => ['nullable', 'exists:guests,id'],
            'description' => ['required'],
            'image_alt' => ['nullable', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'short_description' => ['required', 'min:20'],
            'external_url' => ['nullable'],
            'publish_date' => ['required', 'date', 'date_format:Y-m-d\TH:i'],
            'is_anchor' => ['required', 'boolean'],
            'is_special' => ['required', 'boolean'],
            'image' => ['nullable'],
            'image_description' => ['nullable', 'string', 'max:255'],
            'video_url' => ['nullable'],
            'status' => ['required', 'in:active,draft'],
            'is_breaking' => ['required', 'boolean'],
            'is_banner' => ['nullable', 'boolean'],
            'image_visible' => ['required_if:is_banner', 'boolean'],
            'banner_position' => ['required_if:is_banner', 'integer', 'min:1', 'max:3'],
        ];
    }
}
