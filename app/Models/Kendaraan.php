<?php

namespace App\Models;

use App\Models\KendaraanItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Kendaraan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = ['id'];

    public function items()
    {
        return $this->hasMany(KendaraanItem::class, 'kendaraan_id');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected static function booted()
    {
        static::creating(function ($kendaraan) {
            $kendaraan->uuid = Str::uuid();
        });
    }
}