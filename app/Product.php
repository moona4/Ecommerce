<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function store(){
        return $this ->belongsTo(Store::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
