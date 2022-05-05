<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $fillable = [
        "name",
        "price",
        "photo",
        "text"
    ];

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_item');
    }
}
