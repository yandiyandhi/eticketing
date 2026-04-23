<?php

namespace App\Services\Jabatan;

use App\Models\Jabatan;
use Illuminate\Support\Facades\DB;

class JabatanService
{
    public function store(array $data): Jabatan
    {
        return DB::transaction(function () use ($data) {
            $jabatan = Jabatan::withTrashed()->where('name', $data['name'])->first();

            // jika ada dan soft delete maka restore
            if ($jabatan && $jabatan->trashed()) {
                $jabatan->restore();
                return $jabatan;
            }

            // tapi jika tidak ada buat baru

            return Jabatan::create($data);
        });
    }
}