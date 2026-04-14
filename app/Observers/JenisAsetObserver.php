<?php

namespace App\Observers;

use App\Models\JenisAset;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class JenisAsetObserver
{
    public function create(JenisAset $jenisaset)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'JenisAset',
            'model_id'    => $jenisaset->id,
            'new_data'    => $jenisaset->toArray(),
            'description' => "Jenis Aset baru dibuat: {$jenisaset->name}",
        ]);
    }
    
    public function update(JenisAset $jenisaset)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'JenisAset',
            'model_id'    => $jenisaset->id,
            'new_data'    => $jenisaset->toArray(),
            'description' => "Jenis Aset telah diubah: {$jenisaset->name}",
        ]);
    }

    public function delete(JenisAset $jenisaset)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'JenisAset',
            'model_id'    => $jenisaset->id,
            'new_data'    => $jenisaset->toArray(),
            'description' => "Jenis Aset telah diubah: {$jenisaset->name}",
        ]);
    }
}
