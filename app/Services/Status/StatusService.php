<?php

namespace App\Services\Status;

use App\Models\Status;
use DomainException;
use Illuminate\Support\Facades\DB;

class StatusService
{
    public function createStatus(array $data): Status
    {
        return DB::transaction(function () use ($data) {
            $status = Status::withTrashed()->where('name', $data['name'])->first();

            // Jika ada dan soft delete maka restore
            if ($status && $status->trashed()) {
                $status->restore();
                return $status;
            }

            // Jika tidak ada buat baru
            $data['status'] = 0;
            return Status::create($data);
        });
    }

    public function updateStatus(Status $status, array $data): bool
    {
        // Mulai transaksi
        return DB::transaction(function () use ($status, $data) {
            $status->update($data);
            $data['status'] = 0;
            return $status->save();
        });
    }

    public function deleteStatus(Status $status): bool
    {
        return DB::transaction(function () use ($status) {

            if ($status->users()->exists()) {
                throw new DomainException(
                    'Status tidak bisa dihapus karena masih digunakan oleh User.'
                );
            }

            $status->delete();
        });
    }
}
