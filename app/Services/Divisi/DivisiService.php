<?php

namespace App\Services\Divisi;

use App\Models\Divisi;
use Illuminate\Support\Facades\DB;
use DomainException;

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

        public function delete(Divisi $divisi): void
    {
        DB::transaction(function () use ($divisi) {

            if ($divisi->users()->exists()) {
                throw new DomainException(
                    'Divisi tidak bisa dihapus karena masih digunakan oleh User.'
                );
            }

            $divisi->delete();
        });
    }
}