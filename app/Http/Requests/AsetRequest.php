<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsetRequest extends FormRequest
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
        'nama_aset' => 'required|string|max:255',
        'jenis_aset_id' => 'required|exists:jenis_asets,id',
        'merk' => 'nullable|string|max:255',
        'model' => 'nullable|string|max:255',

        'user_id' => 'required|exists:users,id',
        'kondisi_id' => 'required|exists:kondisi_asets,id',
        'divisi_id' => 'required|exists:divisis,id',
        'kantor_id' => 'required|exists:kantors,id',

        'serial_number' => 'nullable|string|max:255',
        'spesifikasi' => 'nullable|string|max:255',

        'no_polisi' => 'nullable|string|max:50',
        'pajak_stnk' => 'nullable|date',
        'pajak_bpkb' => 'nullable|date',
        'kir' => 'nullable|date',
    ];
    }
}