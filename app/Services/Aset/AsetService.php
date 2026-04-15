<?php

namespace App\Services\Aset;

use App\Models\Aset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

    public function generateQrcode($aset)
    {        
        $filename = $aset->uuid . '.png';

        // generate QR
        $qr = QrCode::format('png')
            ->size(400)
            ->margin(1)
            ->errorCorrection('H')
            ->generate($aset->uuid);

        $qrImage = imagecreatefromstring($qr);

        $width  = imagesx($qrImage);
        $height = imagesy($qrImage);

        // tambah ruang atas untuk nama PT
        $topPadding = 60;
        $canvas = imagecreatetruecolor($width, $height + $topPadding);

        $white = imagecolorallocate($canvas, 255, 255, 255);
        $black = imagecolorallocate($canvas, 0, 0, 0);

        imagefill($canvas, 0, 0, $white);

        // copy QR ke bawah
        imagecopy($canvas, $qrImage, 0, $topPadding, 0, 0, $width, $height);

        /*
        |--------------------------------------------------------------------------
        | Text atas
        |--------------------------------------------------------------------------
        */
        $text = 'PT Sinar Terang Fastener';
        $fontPath = public_path('fonts/calibri-bold.ttf');
        $fontSize = 24;

        $bbox = imagettfbbox($fontSize, 0, $fontPath, $text);
        $textWidth = $bbox[2] - $bbox[0];

        $x = ($width - $textWidth) / 2;
        $y = 35;

        imagettftext(
            $canvas,
            $fontSize,
            0,
            $x,
            $y,
            $black,
            $fontPath,
            $text
        );

        /*
        |--------------------------------------------------------------------------
        | Logo tengah
        |--------------------------------------------------------------------------
        */
        $logoPath = public_path('assets/img/logo/logoqr.png');

        if (file_exists($logoPath)) {
            $logo = imagecreatefrompng($logoPath);

            $logoWidth  = imagesx($logo);
            $logoHeight = imagesy($logo);

            // resize logo
            $newLogoSize = 100;
            $logoResized = imagecreatetruecolor($logoWidth, $logoHeight);

            imagealphablending($logoResized, false);
            imagesavealpha($logoResized, true);

            imagecopyresampled(
                $logoResized,
                $logo,
                0, 0, 0, 0,
                $newLogoSize, $newLogoSize,
                $logoWidth, $logoHeight
            );

            // posisi tengah QR
            $centerX = ($width / 2) - ($newLogoSize / 2);
            $centerY = ($height / 2) - ($newLogoSize / 2) + $topPadding;

            imagecopy(
                $canvas,
                $logoResized,
                $centerX,
                $centerY,
                0,
                0,
                $newLogoSize,
                $newLogoSize
            );

            imagedestroy($logo);
            imagedestroy($logoResized);
        }

        ob_start();
        imagepng($canvas);
        $final = ob_get_clean();

        imagedestroy($qrImage);
        imagedestroy($canvas);

        Storage::disk('public')->put('qrcode/'.$filename, $final);

        $aset->updateQuietly([
            'qrcode' => $filename
        ]);
    }
}