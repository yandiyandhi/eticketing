<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceKendaraanRequest;
use App\Models\Aset;
use App\Models\JenisAset;
use App\Models\Kendaraan;
use App\Services\ServiceKendaraan\KendaraanService;

class KendaraanController extends Controller
{
    public function index()
    {
        $data = Kendaraan::with(['items', 'aset.jenis_aset', 'userPengajuan'])->where('status', ['diajukan', 'proses'])->orderBy('tanggal_pengajuan', 'desc')->paginate(10)->withQueryString();
        // dd($data);
        return view('serviceKendaraan.index', compact('data'));
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

    public function detailPengajuan()
    {
        return view('serviceKendaraan.detailPengajuan');
    }
}
