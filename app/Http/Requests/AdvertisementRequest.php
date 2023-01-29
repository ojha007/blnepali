<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
{
    public function rules():array
    {
        $id = $this->route()->parameter('advertisement');

        return [
            'title' => 'required|max:255|unique:advertisements,title,'.$id,
            'image' => 'required',
            'url' => 'required',
            'placement' => 'nullable',
            'for' => 'required_if:is_active,==,1',
            'sub_for' => 'required_with:for',
            'description' => 'nullable',
            'sub_description' => 'nullable|max:255',
            'is_active' => 'required|boolean',
            'sub_placement' => 'nullable',
        ];
    }

}
