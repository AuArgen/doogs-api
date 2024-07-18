<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'sku',
        'name',
        'description',
        'is_published',
    ];
    public function prices()
    {
        return $this->hasOne(Price::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function characteristics()
    {
        return $this->hasMany(Characteristic::class);
    }
}
