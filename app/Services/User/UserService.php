<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function create(array $data): User
    {        
        return User::create($data);
    }

    public function update($id, array $data): void
    {
        $user = User::where('uuid', $id)->firstOrFail();
        DB::transaction(function () use ($data, $user) {
            $user->update($data);
        });
    }
}