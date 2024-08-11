<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            "title" => "required|min:2|max:50",
            "description" => "required|min:2|max:200",
            "author" => "required|min:2|max:60|unique:books",
            "cover_image" => "required|image|mimes:jpeg,jpg,png,gif,svg,webp|max:2048",
            "nb_pages" => "required|integer|min:15|max:500",
        ];
    }
}
