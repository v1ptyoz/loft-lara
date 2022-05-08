<?php

namespace App\Http\Controllers;


use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return view("admin.orders", ["orders" => Order::all()]);
    }

    public function edit() {}

    public function delete(Request $request) {
        Order::find($request->id)->delete();
        return view("admin.orders", ["orders" => Order::all()]);
    }

}
