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
}