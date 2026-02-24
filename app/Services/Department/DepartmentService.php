<?php

namespace App\Services\Department;

use App\Models\Department;
use Illuminate\Support\Facades\DB;
use DomainException;

class DepartmentService
{
    public function createDepartment(array $data): Department
    {
        return DB::transaction(function () use ($data) {
            $department = Department::withTrashed()->where('name', $data['name'])->first();

            // Jika ada dan soft delete maka restore
            if ($department && $department->trashed()) {
                $department->restore();
                return $department;
            }

            // Jika tidak ada buat baru
            return Department::create($data);
        });
    }

    public function updateDepartment(Department $department, array $data): bool
    {
        return DB::transaction(function () use ($department, $data) {
            $department->update($data);
            return $department->save();
        });
    }

    public function delete(Department $department): void
    {
        DB::transaction(function () use ($department) {

            if ($department->users()->exists()) {
                throw new DomainException(
                    'Departemen tidak bisa dihapus karena masih digunakan oleh User.'
                );
            }

            $department->delete();
        });
    }
}
