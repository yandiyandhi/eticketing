<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Kpi extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function ticketing()
    {
        return $this->hasMany(Ticket::class);
    }

    public function getRouteKey()
    {
        return 'uuid';
    }

    protected static function booted()
    {
        static::creating(function ($status) {
            $status->uuid = Str::uuid();
        });
    }
}
