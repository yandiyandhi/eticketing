<?php

namespace App\Observers;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class RoleObserver
{
    public function create($role)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'Role',
            'model_id'    => $role->id,
            'new_data'    => $role->toArray(),
            'description' => "Role baru dibuat: {$role->name}",
        ]);
    }

    public function update($role)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'Role',
            'model_id'    => $role->id,
            'new_data'    => $role->toArray(),
            'description' => "Role diperbarui: {$role->name}",
        ]);
    }

    public function delete($role)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'delete',
            'model'       => 'Role',
            'model_id'    => $role->id,
            'new_data'    => $role->toArray(),
            'description' => "Role dihapus: {$role->name}",
        ]);
    }

    public function saving(Role $role): void
    {
        $role->name = collect(explode(' ', $role->name))
            ->map(function ($word) {

                if (strlen($word) <= 3) {
                    return strtoupper($word);
                }

                return Str::title(strtolower($word));
            })
            ->implode(' ');
    }
}
