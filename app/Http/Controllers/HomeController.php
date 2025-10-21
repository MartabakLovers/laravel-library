<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() 
    {
        $data = Category::all();
        return view('welcome', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name',
        ], [
            'category_name.required' => "Category is required Bos",
            'category_name.unique' => "Category tos aya di database bos",
        ]);

        Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect("/home")->with("success", "Category has been added!");
    }
}
