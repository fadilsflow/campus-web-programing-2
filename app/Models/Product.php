<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Binafy\LaravelCart\Cartable;


class Product extends Model implements Cartable
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'sku',
        'price',
        'stock',
        'category_id',
        'image_url',
        'is_active'
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'stock' => 'integer',
        'is_active' => 'boolean'
    ];
    public function getPrice(): float
    {
        return $this->price;
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
