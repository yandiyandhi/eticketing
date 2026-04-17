<?php

namespace App\Services\ServiceKendaraan;

use App\Models\Kendaraan;
use App\Models\KendaraanItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KendaraanService
{
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $items = collect($data['items'] ?? [])->map(function($item){
                $item['harga'] = str_replace('.','',$item['harga'] ?? 0);
                $item['subtotal'] = str_replace('.','',$item['subtotal'] ?? 0);

                return $item;
            });            
            unset($data['items']);
            
            if(!empty($data['kilometer_awal'])){
                $data['kilometer_awal'] = str_replace('.','',$data['kilometer_awal'] ?? 0);
            }

            $last = Kendaraan::withTrashed()
                ->where('kode_service', 'like', 'SRV%')
                ->orderByDesc('kode_service')
                ->first();

            if (!$last) {
                $data['kode_service'] = 'SRV0001';
            } else {
                $number = (int) substr($last->kode_service, 3);
                $data['kode_service'] = 'SRV' . str_pad($number + 1, 4, '0', STR_PAD_LEFT);
            }

            $data['tanggal_pengajuan'] = now();
            $data['diajukan_oleh'] = Auth::user()->id;

            $service = Kendaraan::create($data);

            if(!empty($items)){                
                $service->items()->createMany($items);
            }

            return $service;
        });
    }
}