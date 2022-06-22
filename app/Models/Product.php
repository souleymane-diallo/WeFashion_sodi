<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'reference',
        'visibility',
        'state',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function picture()
    {
        return $this->hasOne(Picture::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function scopePublished($query)
    {
        return $query->where('visibility', 'published');
    }
}
