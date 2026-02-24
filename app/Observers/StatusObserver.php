<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StatusObserver
{
    public function created(\App\Models\Status $status): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'Status',
            'model_id'    => $status->id,
            'new_data'    => $status->toArray(),
            'description' => "Status baru dibuat: {$status->name}",
        ]);
    }

    public function update(Status $status): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'Status',
            'model_id'    => $status->id,
            'new_data'    => $status->toArray(),
            'description' => "Status diperbarui: {$status->name}",
        ]);
    }

    public function creating(Status $status): void
    {
        $status->updated_at = null;
    }

    public function saving(Status $status): void
    {
        $status->name = Str::title(
            strtolower($status->name)
        );
    }
}
