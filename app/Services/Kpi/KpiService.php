<?php

namespace App\Services\Kpi;

use App\Models\Kpi;
use Illuminate\Support\Facades\DB;
use DomainException;

class KpiService
{
    public function store(array $data): Kpi
    {
        return DB::transaction(function () use ($data) {
            $kpi = Kpi::withTrashed()->where('name', $data['name'])->first();

            // Jika ada dan soft delete maka restore
            if ($kpi && $kpi->trashed()) {
                $kpi->restore();
                return $kpi;
            }

            // Jika tidak ada buat baru
            return Kpi::create($data);
        });
    }

    public function udpateKpi(Kpi $kpi, array $data): bool
    {        
        return DB::transaction(function () use ($kpi, $data) {
            $kpi->update($data);
            return $kpi->save();
        });
    }

    public function delete(Kpi $kpi): void
    {
        DB::transaction(function () use ($kpi) {

            if ($kpi->ticketing()->exists()) {
                throw new DomainException(
                    'KPI tidak bisa dihapus karena masih digunakan.'
                );
            }

            $kpi->delete();
        });
    }
}