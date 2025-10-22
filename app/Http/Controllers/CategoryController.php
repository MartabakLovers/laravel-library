<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Category::all();
        return view('categories.index', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect("/category")->with("success", "Category has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Category::find($id);
        return view("categories.edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name'
        ], [
            'category_name.required' => "Category is required boss!",
            'category_name.unique' => "Category has been updated",
        ]);

        $data = Category::find($id);
        $data->category_name = $request->category_name;
        $data->save();

        return view("categories.index", compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Category::findOrFail($id);
        $data->delete();

        return redirect("/category")->with("success", "Category has been Deleted!!");
    }
}
