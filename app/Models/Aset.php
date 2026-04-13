<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

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
    }
}
