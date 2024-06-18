<?php

namespace App\Http\Requests;

use App\Models\Reporter;
use Illuminate\Foundation\Http\FormRequest;

class ReporterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:'.new Reporter(),
            'slug' => 'required|string|max:255',
            'designation' => 'nullable',
            'organization' => 'nullable',
            'address' => 'nullable',
            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'phone_number' => 'nullable',
            'email' => 'nullable|email',
            'caption' => 'nullable',
            'image' => 'nullable',
        ];
    }
}
