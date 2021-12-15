<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Unit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'unit',
    ];
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
        static::updating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}
