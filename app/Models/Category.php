<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'category_task';
    use HasFactory, SoftDeletes;

    protected $fillable = ['task_name', 'uuid'];

    public function ticketing()
    {
        return $this->hasMany(Ticket::class);
    }

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    protected static function booted()
    {
        static::creating(function ($category) {
            $category->uuid = Str::uuid();
        });
    }
}
