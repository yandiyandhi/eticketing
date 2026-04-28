<?php

namespace App\Observers;

use App\Models\Divisi;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DivisiObserver
{
    public function created(Divisi $divisi): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'Divisi',
            'model_id'    => $divisi->id,
            'new_data'    => $divisi->toArray(),
            'description' => "Divisi baru dibuat: {$divisi->name}",
        ]);
    }

    public function update(Divisi $divisi): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'divisi',
            'model_id'    => $divisi->id,
            'new_data'    => $divisi->toArray(),
            'description' => "Departemen diperbarui: {$divisi->name}",
        ]);
    }
    public function creating(divisi $divisi): void
    {
        $divisi->updated_at = null;
    }

    public function saving(divisi $divisi): void
    {
        if (isset($divisi->name)) {
            $length = strlen($divisi->name);

            if ($length >= 2 && $length <= 3) {
                $divisi->name = strtoupper($divisi->name);
            } else {
                $divisi->name = Str::title($divisi->name);
            }
        }
    }
}
