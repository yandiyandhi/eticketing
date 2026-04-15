<?php

namespace App\Jobs;

use App\Models\Aset;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GenerateAssetQrJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function handle(): void
    {
        Aset::chunk(50, function ($assets) {        
            foreach ($assets as $asset) {
                 app(\App\Services\Aset\AsetService::class)
                ->generateQrcode($asset);
            }
        });
    }
}