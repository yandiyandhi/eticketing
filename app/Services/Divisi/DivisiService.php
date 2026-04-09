<?php

namespace App\Services\Divisi;

use App\Models\Divisi;
use Illuminate\Support\Facades\DB;

class DivisiService
{
    public function createDivisi(array $data): Divisi
    {
        return DB::transaction(function () use ($data) {
            $divisi = Divisi::withTrashed()->where('name', $data['name'])->first();

            // jika ada dan soft delete maka restore
            if ($divisi && $divisi->trashed()) {
                $divisi->restore();
                return $divisi;
            }

            // tapi jika tidak ada buat baru

            return Divisi::create($data);
        });

    }
}