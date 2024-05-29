<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDestinationRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:64',
            'slug' => 'nullable|string|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:destinations,slug',
            'description' => 'nullable|string|max:255',
            'address' => 'required|string|min:3|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp,jfif|max:2048'
        ];
    }
}
