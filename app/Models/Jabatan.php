<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Jabatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];    

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected static function booted()
    {
        static::creating(function($jabatan) {
            $jabatan->uuid = Str::uuid();

            if (isset($jabatan->name)) {
                $length = strlen($jabatan->name);

                if ($length >= 2 && $length <= 3) {
                    $jabatan->name = strtoupper($jabatan->name);
                }else {
                    $jabatan->name = Str::title($jabatan->name);
                }
            }

        });
    }
}
