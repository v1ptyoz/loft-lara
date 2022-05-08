<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return view("admin.orders", ["orders" => Order::all()]);
    }

    public function create() {}

    public function edit() {}

    public function delete(Request $request) {
        Order::find($request->id)->delete();
        return view("admin.orders", ["orders" => Order::all()]);
    }

}
