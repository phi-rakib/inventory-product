<?php

namespace PhiRakib\InventoryProduct\Controllers;

use Illuminate\Http\Request;
use PhiRakib\InventoryProduct\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function show($id)
    {
        return Category::findOrFail($id);
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        return response()->json(['message' => 'Category Created Successfully'], 201);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update($request->all());

        return response()->json(['message' => 'Category Updated Succesfully'], 200);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Category Deleted Successfully'], 204);
    }
}
