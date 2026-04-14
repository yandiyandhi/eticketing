<?php

namespace App\Services\Aset;

use App\Models\Aset;
use Illuminate\Support\Facades\DB;

class AsetService
{
    public function create(array $data): Aset
    {
        return DB::transaction(function () use ($data) {            
            $aset = Aset::withTrashed()->where('nama_aset', $data['nama_aset'])->first();
            
            if($aset && $aset->trashed()){
                $aset->restore();
                return $aset;
            }

            $last = Aset::withTrashed()
                ->where('kode_aset', 'like', 'AST%')
                ->orderByDesc('kode_aset')
                ->first();

            if (!$last) {
                $data['kode_aset'] = 'AST0001';
            } else {
                $number = (int) substr($last->kode_aset, 3);
                $data['kode_aset'] = 'AST' . str_pad($number + 1, 4, '0', STR_PAD_LEFT);
            }

            return Aset::create($data);
        });
    }

    public function getDataElektronik()
    {
        $request = request('requestelektronik');

        $aset = Aset::with(['jenis_aset', 'kondisi', 'user', 'kantor', 'divisi'])
                ->whereNotIn('jenis_aset_id', ['5','6'])
                ->orderBy('nama_aset', 'asc');

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

        return $aset->paginate(10)->withQueryString();
    }
    
    public function getDataMobil()
    {
        $request = request('requestmobil');

        $aset = Aset::with(['jenis_aset', 'kondisi', 'user', 'kantor', 'divisi'])
                ->whereIn('jenis_aset_id', ['5','6'])
                ->orderBy('nama_aset', 'asc');

        if($request){
            $aset->where(function ($query) use ($request) {
                $query->Where('nama_aset', 'like', "%{$request}%")
                    ->orWhere('kode_aset', 'like', "%{$request}%")
                    ->orWhere('model', 'like', "%{$request}%")
                    ->orWhere('serial_number', 'like', "%{$request}%")
                    ->orWhere('spesifikasi', 'like', "%{$request}%")
                    ->orWhere('no_polisi', 'like', "%{$request}%")
                    ->orWhere('merk', 'like', "%{$request}%")
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

        return $aset->paginate(10)->withQueryString();
    }
}