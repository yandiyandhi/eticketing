<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Services\Role\RoleService;
use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::orderBy('name', 'asc')->paginate(10);
        
        return view('role.index', compact('role'));
    }

    public function store(RoleRequest $request, RoleService $roleService)
    {
        try {
            $roleService->create($request->validated());

            return redirect()->back()->with('success', 'Role berhasil dibuat.');
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Role gagal dibuat. Error: ' . $th->getMessage());
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('role.editRole', compact('role'));
    }

    public function update(RoleRequest $request, RoleService $roleService, $id  )
    {
        try {
            $roleService->update($id, $request->validated());

            return redirect()->back()->with('success', 'Role berhasil diperbarui.');
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Role gagal diperbarui. Error: ' . $th->getMessage());
        }
    }

    public function destroy($id, RoleService $roleService)
    {
        try {
            $roleService->delete($id);
            return redirect()->back()->with('success', 'Role berhasil dihapus.');
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Role gagal dihapus. Error: ' . $th->getMessage());
        }   
    }
}
