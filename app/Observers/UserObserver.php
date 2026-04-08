<?php

namespace App\Observers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class UserObserver
{
    public function create($user)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'create',
            'model'       => 'User',
            'model_id'    => $user->id,
            'new_data'    => $user->toArray(),
            'description' => "User baru dibuat: {$user->name}",
        ]);
    }

    public function update($user)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'update',
            'model'       => 'User',
            'model_id'    => $user->id,
            'new_data'    => $user->toArray(),
            'description' => "User diperbarui: {$user->name}",
        ]);
    }

    public function delete($user)
    {
        ActivityLog::create([
            'user_name'   => Auth::user()?->username ?? 'Guest',
            'action'      => 'delete',
            'model'       => 'User',
            'model_id'    => $user->id,
            'new_data'    => $user->toArray(),
            'description' => "User dihapus: {$user->name}",
        ]);
    }
}
