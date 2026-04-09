<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisiRequest;
use App\Models\Department;
use App\Models\Divisi;
use App\Services\Divisi\DivisiService;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $data = Divisi::orderBy('name', 'asc')->paginate(10);
        return view('dataRef.divisi.index', compact('data'));
    }

    public function create()
    {
        $dept = Department::orderBy('name', 'asc')->get();
        return view('dataRef.divisi.addDivisi', compact('dept'));
    }

    public function store(DivisiRequest $request, DivisiService $divisiService)
    {
        $divisiService->createDivisi($request->validated());

        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil dibuat.');

    }

    public function edit($id)
    {
        $divisi = Divisi::where('uuid', $id)->first();
        $departments = Department::orderBy('name', 'asc')->get();
        return view('dataRef.divisi.editDivisi', compact('divisi', 'departments'));
    }
}
