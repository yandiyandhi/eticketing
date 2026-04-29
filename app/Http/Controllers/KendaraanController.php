<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceKendaraanRequest;
use App\Models\Aset;
use App\Models\JenisAset;
use App\Models\Kendaraan;
use App\Services\ServiceKendaraan\KendaraanService;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;

class KendaraanController extends Controller
{
    public function index()
    {
        $data = Kendaraan::with(['items', 'aset.jenis_aset', 'userPengajuan'])->where('status', ['diajukan', 'proses'])->orderBy('tanggal_pengajuan', 'desc')->paginate(10)->withQueryString();        
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

    public function editService($id)
    {
        $jenisaset = JenisAset::whereIn('name', ['motor', 'mobil'])->get();
        $kendaraan = Kendaraan::with(['items', 'aset.jenis_aset'])->where('uuid', $id)->first();
        $aset = Aset::where('jenis_aset_id', $kendaraan->aset->jenis_aset->id)->get();
        // dd($kendaraan);
        return view('serviceKendaraan.editServiceKendaraan', compact('jenisaset', 'kendaraan', 'aset'));
    }

    public function update($id, ServiceKendaraanRequest $request, KendaraanService $kendaraanService)
    {
        try {
            $kendaraanService->update($id, $request->validated());
            return redirect()->back()->with("success", "Request berhasil diupdate.");
        } catch (Exception $th) {
            return redirect()->back()->with("error", "Gagal mengupdate request.");
        }
    }

    public function detailPengajuan($id)
    {
        try {
            $kendaraan = Kendaraan::with(['items', 'aset', 'userPengajuan.jabatan', 'userPengajuan.department.divisi'])->where('uuid', $id)->first();
            $pdf = Pdf::loadView('pdf.pengajuanService', [
                'kendaraan' => $kendaraan
            ]);

            return $pdf->stream('pdf.pengajuanService');
        } catch (\Throwable $th) {
            return abort(404, 'Not Found.');
        }
    }

    public function batalService($id, KendaraanService $kendaraanService)
    {
        try {
            $kendaraanService->batalService($id);
            return redirect()->back()->with("success", "Pengajuan service berhasil dibatalkan.");            
        } catch (Exception $th) {
            return redirect()->back()->with("error", "Gagal membatalkan pengajuan service.");            
        }
    }

    public function editStatus($id)
    {
        $service = Kendaraan::where('uuid', $id)->firstOrFail();
        return view('serviceKendaraan.updateStatus', compact('service'));
    }
}