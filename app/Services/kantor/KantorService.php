<?php

namespace App\Services\kantor;

use App\Models\Kantor;
use Illuminate\Support\Facades\DB;

class KantorService
{   
    public function create(array $data)
    {
        DB::transaction(function () use ($data) {

         $kantor = Kantor::withTrashed()->where('name', $data['name'])->first();

            // Jika ada dan soft delete maka restore
            if ($kantor && $kantor->trashed()) {
                $kantor->restore();
                return $kantor;
            }
            
            Kantor::create($data);
        });
    }

    public function update(array $data, Kantor $kantor): void
    {
            DB::transaction(function () use ($data, $kantor) {
                $kantor->update($data);
            });
    }
}