<?php

namespace App\Http\Controllers;

use App\Http\Requests\AsetRequest;
use App\Models\Aset;
use App\Models\Department;
use App\Models\Divisi;
use App\Models\JenisAset;
use App\Models\Kantor;
use App\Models\KondisiAset;
use App\Models\User;
use App\Services\Aset\AsetService;

class AsetController extends Controller
{
    public function index(AsetService $asetService)
    {
        $asetelektronik = $asetService->getDataElektronik();
        $asetelmobil = $asetService->getDataMobil();
        // dd($asetelektronik);
        return view('aset.index', compact('asetelektronik', 'asetelmobil'));
    }

    public function create()
    {
        $kondisi = KondisiAset::orderBy('name', 'asc')->get();
        $jenisaset = JenisAset::orderBy('name', 'asc')->get();
        $kantors = Kantor::orderBy('name', 'asc')->get();
        $users = User::orderBy('name', 'asc')->get();        
        $divisi = Divisi::orderBy('name', 'asc')->get();        
        $departemen = Department::orderBy('name', 'asc')->get();        

        return view('dataRef.aset.createAset', compact('kondisi', 'jenisaset', 'kantors', 'users', 'divisi', 'departemen'));
    }

    public function store(AsetRequest $request, AsetService $asetService)
    {
        $asetService->create($request->validated());

        return redirect()->back()->with('success', 'Aset berhasil ditambahkan.');
    }
}