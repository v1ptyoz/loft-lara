<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view("admin.categories", ["categories" => Category::all()]);
    }

    public function create(Request $request) {
        Category::create([
            "name" => $request->input("name"),
            "text" => $request->input("text"),
        ]);
        return view("admin.categories", ["categories" => Category::all()]);
    }
    public function edit(Request $request) {
        $category = Category::find($request->id);
        $edited = false;

        if ($category->name != $request->input("name")) {
            $category->name = $request->input("name");
            $edited = true;
        }

        if ($category->text != $request->input("text")) {
            $category->text = $request->input("text");
            $edited = true;
        }

        if($edited) {
            $category->save();
        }

        return view("admin.categories", ["categories" => Category::all()]);
    }
    public function delete(Request $request) {
        Category::find($request->id)->delete();
        return view("admin.categories", ["categories" => Category::all()]);
    }

}
