<?php

namespace App\Services\ServiceKendaraan;

use App\Models\Kendaraan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KendaraanService
{
    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {

            $items = collect($data['items'] ?? [])->map(function ($item) {
                $item['harga'] = str_replace('.', '', $item['harga'] ?? 0);
                $item['subtotal'] = str_replace('.', '', $item['subtotal'] ?? 0);
                return $item;
            });

            unset($data['items']);

            if (!empty($data['kilometer_awal'])) {
                $data['kilometer_awal'] = str_replace('.', '', $data['kilometer_awal']);
            }

            /* =========================
            KODE SERVICE
            ========================= */
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
            $data['diajukan_oleh'] = Auth::id();

            /* =========================
            IMAGE SETUP (PURE GD SAFE)
            ========================= */
            $folder = storage_path('app/public/serviceKendaraan');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            /**
             * COMPRESS TANPA READ ISSUE (PAKAI GD PURE)
             */
            $compressImage = function ($file, $prefix) use ($folder) {

                $unique = \Illuminate\Support\Str::random(10);

                $filename = $prefix . '_' . $unique . '.jpg';
                $path = $folder . '/' . $filename;

                $info = getimagesize($file->getPathname());

                switch ($info['mime']) {
                    case 'image/jpeg':
                        $image = imagecreatefromjpeg($file->getPathname());
                        break;

                    case 'image/png':
                        $image = imagecreatefrompng($file->getPathname());
                        break;

                    case 'image/webp':
                        $image = imagecreatefromwebp($file->getPathname());
                        break;

                    default:
                        return null;
                }

                $width = imagesx($image);
                $height = imagesy($image);

                $newWidth = 1200;
                $newHeight = ($height / $width) * $newWidth;

                $newImage = imagecreatetruecolor($newWidth, $newHeight);

                imagecopyresampled(
                    $newImage,
                    $image,
                    0,
                    0,
                    0,
                    0,
                    $newWidth,
                    $newHeight,
                    $width,
                    $height
                );

                imagejpeg($newImage, $path, 65);

                imagedestroy($image);
                imagedestroy($newImage);

                return 'serviceKendaraan/' . $filename;
            };

            /* =========================
            FOTO 1
            ========================= */
            if (!empty($data['foto1']) && $data['foto1'] instanceof \Illuminate\Http\UploadedFile) {
                $data['foto1'] = $compressImage($data['foto1'], 'foto1');
            }

            /* =========================
            FOTO 2
            ========================= */
            if (!empty($data['foto2']) && $data['foto2'] instanceof \Illuminate\Http\UploadedFile) {
                $data['foto2'] = $compressImage($data['foto2'], 'foto2');
            }
            /* =========================
            SAVE DATA
            ========================= */
            $service = Kendaraan::create($data);

            if ($items->isNotEmpty()) {
                $service->items()->createMany($items);
            }

            return $service;
        });
    }

    public function batalService($id)
    {    
        return DB::transaction(function () use ($id) {
             $service = Kendaraan::where('uuid', $id)->firstOrFail();
             $service->status = 'batal';
             $service->save();
        });
    }

    public function update($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {

            $service = Kendaraan::where('uuid', $id)->firstOrFail();

            $items = collect($data['items'] ?? [])->map(function ($item) {
                $item['harga'] = str_replace('.', '', $item['harga'] ?? 0);
                $item['subtotal'] = str_replace('.', '', $item['subtotal'] ?? 0);
                return $item;
            });

            unset($data['items']);

            if (!empty($data['kilometer_awal'])) {
                $data['kilometer_awal'] = str_replace('.', '', $data['kilometer_awal']);
            }

            /* =========================
            IMAGE SETUP
            ========================= */
            $folder = storage_path('app/public/serviceKendaraan');

            if (!file_exists($folder)) {
                mkdir($folder, 0755, true);
            }

            $compressImage = function ($file, $prefix) use ($folder) {

                $unique = \Illuminate\Support\Str::random(10);
                $filename = $prefix . '_' . $unique . '.jpg';
                $path = $folder . '/' . $filename;

                $info = getimagesize($file->getPathname());

                switch ($info['mime']) {
                    case 'image/jpeg':
                        $image = imagecreatefromjpeg($file->getPathname());
                        break;
                    case 'image/png':
                        $image = imagecreatefrompng($file->getPathname());
                        break;
                    case 'image/webp':
                        $image = imagecreatefromwebp($file->getPathname());
                        break;
                    default:
                        return null;
                }

                $width = imagesx($image);
                $height = imagesy($image);

                $newWidth = 1200;
                $newHeight = ($height / $width) * $newWidth;

                $newImage = imagecreatetruecolor($newWidth, $newHeight);

                imagecopyresampled(
                    $newImage,
                    $image,
                    0, 0, 0, 0,
                    $newWidth,
                    $newHeight,
                    $width,
                    $height
                );

                imagejpeg($newImage, $path, 65);

                imagedestroy($image);
                imagedestroy($newImage);

                return 'serviceKendaraan/' . $filename;
            };

            /* =========================
            FOTO 1
            ========================= */
            if (!empty($data['foto1']) && $data['foto1'] instanceof \Illuminate\Http\UploadedFile) {
                // $data['foto1'] = $compressImage($data['foto1'], 'foto1');
                 // hapus foto lama
                if ($service->foto1 && file_exists(storage_path('app/public/' . $service->foto1))) {
                    unlink(storage_path('app/public/' . $service->foto1));
                }

                // simpan foto baru
                $data['foto1'] = $compressImage($data['foto1'], 'foto1');
            } else {
                unset($data['foto1']); // penting: jangan overwrite kalau kosong
            }

            /* =========================
            FOTO 2
            ========================= */
            if (!empty($data['foto2']) && $data['foto2'] instanceof \Illuminate\Http\UploadedFile) {
                // $data['foto2'] = $compressImage($data['foto2'], 'foto2');

                if ($service->foto2 && file_exists(storage_path('app/public/' . $service->foto2))) {
                    unlink(storage_path('app/public/' . $service->foto2));
                }

                $data['foto2'] = $compressImage($data['foto2'], 'foto2');
            } else {
                unset($data['foto2']);
            }

            /* =========================
            UPDATE DATA (FIX)
            ========================= */
            $service->update($data);

            /* =========================
            UPDATE ITEMS
            ========================= */
            if ($items->isNotEmpty()) {

                // hapus lama supaya tidak double
                $service->items()->delete();

                $service->items()->createMany($items->toArray());
            }

            return $service;
        });
    }
}