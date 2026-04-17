<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class KendaraanItem extends Model
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
        static::creating(function ($kendaraanItem) {
            $kendaraanItem->nama_item = Str::title($kendaraanItem->nama_item);
        });
    }
}
