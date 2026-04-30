<?php

namespace App\Services\User;

use App\Models\Divisi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function create(array $data): User
    {   
        return DB::transaction(function () use ($data) {
            if(!empty($data['divisi_id'])) {
                $divisi = Divisi::with('department')->find($data['divisi_id']);
                $data['department_id'] = $divisi->id;
            }            
            $user = User::create($data);
            return $user;
        });
    }

    public function update($id, array $data): void
    {
        $user = User::where('uuid', $id)->firstOrFail();
        DB::transaction(function () use ($data, $user) {
            if(!empty($data['divisi_id'])) {
                $divisi = Divisi::with('department')->find($data['divisi_id']);
                $data['department_id'] = $divisi->id;
            }
            
            $user->update($data);
        });
    }
}