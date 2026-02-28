<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ticket extends Model
{
    protected $table = 'ticketing';

    protected $guarded = ['id'];

    public function getRouteKeyName()
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
