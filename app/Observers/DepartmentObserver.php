<?php

namespace App\Observers;

use App\Models\ActivityLog;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class DepartmentObserver
{
    public function created(Department $department): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'Department',
            'model_id'    => $department->id,
            'new_data'    => $department->toArray(),
            'description' => "Departemen baru dibuat: {$department->name}",
        ]);
    }

    public function update(Department $department): void
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'Department',
            'model_id'    => $department->id,
            'new_data'    => $department->toArray(),
            'description' => "Departemen diperbarui: {$department->name}",
        ]);
    }

    public function creating(Department $department): void
    {
        $department->updated_at = null;
    }
}
