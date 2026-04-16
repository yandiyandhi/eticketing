<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\JenisAset;

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
}
