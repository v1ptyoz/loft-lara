<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index() {
        return view("admin.items", ["items" => Item::all(), "categories"=> Category::all()]);
    }

    public function create(Request $request) {
        $path = "";
        if ($request->file("photo")) {
            $path = $request->file('photo')->store('public/items');
            $path = str_replace("public", "storage", $path);
        }

        Item::create([
           "name" => $request->name,
           "text" => $request->text,
           "price" => $request->price,
           "photo" => $path,
           "category_id" => $request->category
        ]);

        return view("admin.items", ["items" => Item::all(), "categories"=> Category::all()]);
    }

    public function edit(Request $request) {
        $item = Item::find($request->id);
        $edited = false;

        if ($item->name != $request->input("name")) {
            $item->name = $request->input("name");
            $edited = true;
        }

        if ($item->text != $request->input("text")) {
            $item->text = $request->input("text");
            $edited = true;
        }

        if ($item->price != $request->input("price")) {
            $item->price = $request->input("price");
            $edited = true;
        }

        if ($item->category_id != $request->input("category")) {
            $item->category_id = $request->input("category");
            $edited = true;
        }

        if ($request->file("photo")) {
            $path = $request->file('photo')->store('public/items');
            $path = str_replace("public", "storage", $path);
            $item->photo = $path;
            $edited = true;
        }

        if($edited) {
            $item->save();
        }

        return view("admin.items", ["items" => Item::all(), "categories"=> Category::all()]);
    }

    public function delete(Request $request) {
        Item::find($request->id)->delete();
        return view("admin.items", ["items" => Item::all(), "categories"=> Category::all()]);
    }
}
