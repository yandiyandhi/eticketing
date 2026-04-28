<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Divisi extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected static function booted()
    {
        static::creating(function ($divisi) {
            $divisi->uuid = Str::uuid();

            if (isset($divisi->name)) {
                $length = strlen($divisi->name);

                if ($length >= 2 && $length <= 3) {
                    $divisi->name = strtoupper($divisi->name);
                } else {
                    $divisi->name = Str::title($divisi->name);
                }
            }
        });
    }
}