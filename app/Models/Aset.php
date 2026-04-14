<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Aset extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function jenis_aset()
    {
        return $this->belongsTo(JenisAset::class, 'jenis_aset_id');
    }

    public function kondisi()
    {
        return $this->belongsTo(KondisiAset::class, 'kondisi_id');
    }

    public function kantor()
    {
        return $this->belongsTo(Kantor::class, 'kantor_id');
    }

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected static function booted()
    {
        static::creating(function ($aset) {
            $aset->uuid = Str::uuid();            
        });

        static::saving(function ($aset) {
            $fields = ['name', 'merk', 'spesifikasi'];

            foreach ($fields as $field) {
                if (!empty($aset->$field)) {
                    $aset->$field = Str::title(trim($aset->$field));
                    }
            }

            $upperFields = ['serial_number','model', 'no_polisi'];

            foreach ($upperFields as $field) {
                if (!empty($aset->$field)) {
                    $aset->$field = strtoupper(trim($aset->$field));
                }
            }
        });

        // setelah create → generate QR
        static::created(function ($aset) {
            self::generateQr($aset);
        });

        // jika restore soft delete → generate ulang jika belum ada
        static::restored(function ($aset) {
            if (!$aset->qrcode || !Storage::disk('public')->exists('qrcode/'.$aset->qrcode)) {
                self::generateQr($aset);
            }
        });
    }

    protected static function generateQr($aset)
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