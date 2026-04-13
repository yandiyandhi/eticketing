<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class KondisiAset extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'kondisi_asets';

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected static function booted()
    {
        static::creating(function ($kondisi) {
            $kondisi->uuid = Str::uuid();
        });
    }
}