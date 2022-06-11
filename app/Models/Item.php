<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    protected $fillable = [
        "name",
        "price",
        "photo",
        "text",
        "category_id"
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
