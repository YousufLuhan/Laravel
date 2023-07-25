<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'Name' => 'required|string|max:255',
            'Age' => 'required|integer',
            'Phone' => 'required|string|max:20',
            'Image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Gender' => 'required|in:male,female',
            // 'email' => 'required|email|unique:users',
            // 'password' => 'required|string|min:6|confirmed',
        ];
    }
}