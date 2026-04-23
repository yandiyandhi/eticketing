<?php

namespace App\Observers;

use App\Models\Jabatan;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JabataObserver
{
    public function created(Jabatan $jabatan): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'jabatan',
            'model_id'    => $jabatan->id,
            'new_data'    => $jabatan->toArray(),
            'description' => "jabatan baru dibuat: {$jabatan->name}",
        ]);
    }

    public function update(Jabatan $jabatan): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'jabatan',
            'model_id'    => $jabatan->id,
            'new_data'    => $jabatan->toArray(),
            'description' => "Departemen diperbarui: {$jabatan->name}",
        ]);
    }
    public function creating(Jabatan $jabatan): void
    {
        $jabatan->updated_at = null;
    }

    public function saving(Jabatan $jabatan): void
    {
        $jabatan->name = Str::title(
            strtolower($jabatan->name)
        );
    }
}
