<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepartmentRequest;
use App\Models\Department;
use App\Services\Department\DepartmentService;

class DepartmentController extends Controller
{
    public function index()
    {
        $data = Department::orderBy('name', 'desc')->get();
        return view('dataRef.dept.index', compact('data'));
    }

    public function store(CreateDepartmentRequest $request, DepartmentService $departmentService)
    {
        $departmentService->createDepartment($request->validated());

        return redirect()->back()->with('success', 'Departemen berhasil dibuat.');
    }

    public function update(CreateDepartmentRequest $request, Department $department, DepartmentService $departmentService)
    {
        $departmentService->updateDepartment($department, $request->validated());

        return redirect()->back()->with('success', 'Departemen berhasil diperbarui.');
    }
}
