<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceKendaraanRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jenis_aset_id' => 'required|exists:jenis_asets,id',
            'aset_id' => 'required|exists:asets,id',
            'kilometer_awal' => 'required|numeric',
            'deskripsi_service' => 'nullable|string',
            'alasan_service' => 'nullable|string',
            'foto1' => 'nullable|mimes:jpg,jpeg,png|max:10240',
            'foto2' => 'nullable|mimes:jpg,jpeg,png|max:10240',

            'items' => 'required|array|min:1',

            'items.*.nama_item' => 'required|string|max:255',
            'items.*.keterangan' => 'nullable|string',

            'items.*.qty' => 'required|numeric|min:1',

            'items.*.harga' => 'required',
            'items.*.subtotal' => 'required',
        ];
    }
}