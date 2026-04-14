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
    public function index()
    {
        $request = request('request');

        $aset = Aset::with(['jenis_aset', 'kondisi', 'user', 'kantor', 'divisi'])->orderBy('nama_aset', 'asc');

        if($request){
            $aset->where(function ($query) use ($request) {
                $query->Where('nama_aset', 'like', "%{$request}%")
                    ->orWhere('kode_aset', 'like', "%{$request}%")
                    ->orWhere('model', 'like', "%{$request}%")
                    ->orWhere('serial_number', 'like', "%{$request}%")
                    ->orWhere('spesifikasi', 'like', "%{$request}%")
                    ->orWhere('no_polisi', 'like', "%{$request}%")
                    ->orWhere('pajak_stnk', 'like', "%{$request}%")
                    ->orWhere('pajak_bpkb', 'like', "%{$request}%")
                    ->orWhere('kir', 'like', "%{$request}%")                                       
                    ->orWhere('tanggal_beli', 'like', "%{$request}%")
                    ->orWhere('keterangan', 'like', "%{$request}%")                    
                    ->orWhereHas('jenis_aset', function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request}%");
                    })
                    ->orWhereHas('kantor', function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request}%");
                    })
                    ->orWhereHas('divisi', function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request}%");
                    })
                    ->orWhereHas('kondisi', function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request}%");
                    })
                    ->orWhereHas('user', function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request}%");
                    });
            });
        }

        $aset = $aset->paginate(10)->withQueryString();
        
        return view('aset.index', compact('aset'));
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