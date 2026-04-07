<?php

namespace App\Services\Role;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleService
{
    public function create(array $data): void
    {
        DB::transaction(function () use ($data) {
            Role::create($data);
        });
    }

    public function update($id, array $data): void
    {
        DB::transaction(function () use ($id, $data) {
            $role = Role::findOrFail($id);
            $role->update($data);
        });
    }

    public function delete($id): void
    {
        DB::transaction(function () use ($id) {
            $role = Role::findOrFail($id);
            $role->delete();
        });
    }
}