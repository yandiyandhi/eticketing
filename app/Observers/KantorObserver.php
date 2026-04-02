<?php

namespace App\Observers;
use App\Models\Kantor;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class KantorObserver
{
    public function create($kantor)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'Kantor',
            'model_id'    => $kantor->id,
            'new_data'    => $kantor->toArray(),
            'description' => "Kantor baru dibuat: {$kantor->name}",
        ]);
    }

    public function update($kantor)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'Kantor',
            'model_id'    => $kantor->id,
            'new_data'    => $kantor->toArray(),
            'description' => "Kantor diperbarui: {$kantor->name}",
        ]);
    }

    public function delete($kantor)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'delete',
            'model'       => 'Kantor',
            'model_id'    => $kantor->id,
            'new_data'    => $kantor->toArray(),
            'description' => "Kantor dihapus: {$kantor->name}",
        ]);
    }

    public function saving(Kantor $kantor): void
    {
        $kantor->name = Str::title(
            strtolower($kantor->name)
        );
    }
}
