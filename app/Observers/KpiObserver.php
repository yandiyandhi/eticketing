<?php

namespace App\Observers;

use App\Models\Kpi;
use Illuminate\Support\Str;

class KpiObserver
{
    public function creating(Kpi $kpi): void
    {
        $kpi->updated_at = null;
    }

    public function saving(Kpi $kpi): void
    {
        $kpi->name = Str::title(
            strtolower($kpi->name)
        );
    }
}
