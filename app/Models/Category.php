<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    protected $fillable = [
        "name",
        "text",
    ];

    public function items() {
        return $this->belongsToMany(Item::class, 'category_item');
    }
}
