<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'code',
        'brand',
        'image',
        'description',
        'quantity',
        'alert_quantity',
        'status',
        'category_id',
        'unit_id',
    ];

    use SoftDeletes;
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
    public function categories() {
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function units() {
        return $this->belongsTo(Unit::class,'unit_id','id');
    }
}
