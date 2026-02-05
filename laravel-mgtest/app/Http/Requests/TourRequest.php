<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
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
            'title' => 'required|string|min:3',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'date' => 'required|date|after:today',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'A title is required',
            'title.min' => 'The title must be at least 3 characters long',
            'price.required' => 'A price is required',
            'price.numeric' => 'The price must be a number',
            'date.required' => 'A date is required',
            'date.after' => 'The date must be a future date',
        ];
    }
}