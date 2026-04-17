<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceKendaraanRequest;
use App\Models\Aset;
use App\Models\JenisAset;
use App\Services\ServiceKendaraan\KendaraanService;

class KendaraanController extends Controller
{
    public function index()
    {
        $jenisaset = JenisAset::whereIn('name', ['motor', 'mobil'])->get();

        return view('serviceKendaraan.index', compact('jenisaset'));
    }

    public function create()
    {
        $jenisaset = JenisAset::whereIn('name', ['motor', 'mobil'])->get();

        return view('serviceKendaraan.addServiceKendaraan', compact('jenisaset'));
    }

    public function getDataKendaraan($id)
    {
        $aset = Aset::where('jenis_aset_id', $id)->get();

        return response()->json($aset);
    }

    public function store(ServiceKendaraanRequest $request, KendaraanService $kendaraanService)
    {                
        $kendaraanService->create($request->validated());
        return redirect()->back()->with("success", "Request berhasil disimpan.");
    }
}
