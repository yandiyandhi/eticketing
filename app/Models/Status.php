<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Status extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'status_id');
    }

    protected static function booted()
    {
        static::creating(function ($status) {
            $status->uuid = Str::uuid();
        });
    }
}
