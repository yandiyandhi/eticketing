<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use Exception;
use App\Models\User;
use App\Models\Department;
use App\Models\Kantor;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        try {        
            $user = User::with(['kantor', 'department'])->orderBy('name', 'asc')->paginate(10);               
            return view('dataRef.users.index', compact('user'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function create()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        $kantors = Kantor::orderBy('name', 'asc')->get();

        return view('dataRef.users.createUser', compact('departments', 'kantors'));
    }

    public function store(UserRequest $request, UserService $userService)
    {                
        try {
            $userService->create($request->validated());
            return redirect()->back()->with('success', 'User berhasil ditambahkan.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $user = User::where('uuid', $id)->first();
        $departments = Department::orderBy('name', 'asc')->get();
        $kantors = Kantor::orderBy('name', 'asc')->get();
        
        return view('dataRef.users.editUser', compact('user', 'departments', 'kantors'));
    }

    public function update(EditUserRequest $request, $id, UserService $userService)
    {        
        try {
                $userService->update($id, $request->validated());
                return redirect()->back()->with('success', 'User berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function password($id)
    {
        $user = User::where('uuid', $id)->first();        
        return view('dataRef.users.updatePassword', compact('user'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);

        try {
            $user = User::where('uuid', $id)->first();
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password berhasil diperbarui.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
