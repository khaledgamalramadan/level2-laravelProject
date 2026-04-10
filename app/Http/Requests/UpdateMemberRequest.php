<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMemberRequest extends FormRequest
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
            'name' => 'required|string',
            'position' => 'required|string',
            'facebook' => 'nullable|string',
            'twitter' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('keywords.name'),
            'position' => __('keywords.position'),
            'facebook' => __('keywords.facebook'),
            'twitter' => __('keywords.twitter'),
            'linkedin' => __('keywords.linkedin'),
            'image' => __('keywords.image'),
        ];
    }
}
