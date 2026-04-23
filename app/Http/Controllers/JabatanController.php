<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestJabatan;
use App\Models\Jabatan;
use App\Services\Jabatan\JabatanService;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::orderBy('name', 'asc')->paginate(10)->WithQueryString();

        return view('dataRef.jabatan.index', compact('data'));
    }

    public function create()
    {        
        return view('dataRef.jabatan.addJabatan');
    }

    public function store(RequestJabatan $request, JabatanService $serviceJabatan)
    {
        try {
            $serviceJabatan->store($request->validated());
    
            return redirect()->back()->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data gagal ditambahkan');
        }
    }
}
