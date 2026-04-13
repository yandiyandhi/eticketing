<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Aset;
use Illuminate\Support\Facades\Auth;

class AsetObserver
{
    public function create(Aset $aset)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'Aset',
            'model_id'    => $aset->id,
            'new_data'    => $aset->toArray(),
            'description' => "Aset baru dibuat: {$aset->name}",
        ]);
    }
    
    public function update(Aset $aset)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'Aset',
            'model_id'    => $aset->id,
            'new_data'    => $aset->toArray(),
            'description' => "Aset telah diubah: {$aset->name}",
        ]);
    }
}