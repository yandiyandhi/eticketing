<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTicketingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'request_name' => 'required|string|max:255',
            'request_by' => 'required|numeric|max:1',
            'category_task' => 'required|numeric|max:1',
            'kpi' => 'required|numeric|max:1',
            'keterangan' => 'required|string|max:255',
        ];
    }
}
