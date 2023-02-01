<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type_id' => 'nullable|exists:types,id',
            'name' => 'required|unique:projects|string|max:150',
            'description' => 'required|string|max:255',
            'image' => 'nullable|max:2048',
            'technologies' => 'nullable|exists:technologies,id'
        ];
    }
}
