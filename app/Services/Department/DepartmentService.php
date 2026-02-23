<?php

namespace App\Services\Department;

use App\Models\Department;
use Illuminate\Support\Facades\DB;

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
}
