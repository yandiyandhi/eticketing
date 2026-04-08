<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Services\Role\RoleService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::orderBy('name', 'asc')->paginate(10)->withQueryString();

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

    public function update(RoleRequest $request, RoleService $roleService, $id)
    {
        try {
            $roleService->update($id, $request->validated());

            return redirect()->back()->with('success', 'Role berhasil diperbarui.');
        } catch (Exception $th) {
            return redirect()->back()->with('error', 'Role gagal diperbarui. Error: ' . $th->getMessage());
        }
    }

    public function assignPermission(Request $request, $id)
    {
        try {

            $role = Role::findOrFail($id);

            $request->validate([
                'permission_name' => 'required|exists:permissions,name',
                'checked' => 'required|boolean',
            ]);

            if ($request->checked == 1) {
                $role->givePermissionTo($request->permission_name);
            } else {
                $role->revokePermissionTo($request->permission_name);
            }

            return response()->json(['success' => $role]);
        } catch (Exception $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function permission($id)
    {
        $roleId = $id;
        $permissions = DB::table('permissions')
            ->get()
            ->groupBy(function ($item) {
                return explode('.', $item->name)[0];
            });

        $rolePermissions = DB::table('role_has_permissions')
            ->where('role_id', $id)
            ->pluck('permission_id')
            ->toArray();

        return view('role.roleHasPermission', compact('permissions', 'rolePermissions', 'roleId'));
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
