<?php

namespace App\Services\Kpi;

use App\Models\Kpi;
use Illuminate\Support\Facades\DB;

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
}