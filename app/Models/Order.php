<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $fillable = ["user_id"];

    public function user() {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function items() {
        return $this->belongsToMany(Item::class, 'orders_items');
    }
}
