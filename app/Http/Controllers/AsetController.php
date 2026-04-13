<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;

class AsetController extends Controller
{
    public function index()
    {
        $request = request('request');

        $aset = Aset::with(['jenis_aset', 'kondisi', 'user', 'kantor'])->orderBy('nama_aset', 'asc');

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
                    ->orWhere('divisi', 'like', "%{$request}%")                    
                    ->orWhere('tanggal_beli', 'like', "%{$request}%")
                    ->orWhere('keterangan', 'like', "%{$request}%")                    
                    ->orWhereHas('jenis_aset', function ($q) use ($request) {
                        $q->where('name', 'like', "%{$request}%");
                    })
                    ->orWhereHas('kantor', function ($q) use ($request) {
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
}
