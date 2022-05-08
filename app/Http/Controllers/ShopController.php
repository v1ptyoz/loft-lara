<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function buy(Request $request) {
        if (Auth::user()) {
            return view("shop.confirm", ["item" => Item::find($request->id)]);
        } else {
            return redirect("/login");
        }
    }

    public function confirm(Request $request) {
        $order = Order::create([
            "user_id" => Auth::user()->id
        ]);

        $order->items()->attach($request->item, ["order_id" => $order->id, "created_at" => $order->created_at]);
        $order->save();

        return view("shop.success", ["id" => $order->id]);
    }

}
