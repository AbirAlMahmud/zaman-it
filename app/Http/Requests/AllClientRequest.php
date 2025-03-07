<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AllClientRequest extends FormRequest
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
            'client_name' => 'required|max:255',
            'mobile_number' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required|max:255',
            'service_name' => 'required|max:255',
            'assign_person' => 'required|max:255',
            'note' => 'required|max:255',
            'status' => 'required|max:255',
        ];
    }
}
