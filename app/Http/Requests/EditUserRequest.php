<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'divisi_id' => 'required|exists:divisis,id',
            'jabatan_id' => 'required|exists:jabatans,id',
            'kantor_id' => 'required|exists:kantors,id',
            'email' => 'required|email',
            'active' => 'required|boolean',            
        ];
    }
}
