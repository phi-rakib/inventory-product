<?php

namespace PhiRakib\InventoryProduct\Controllers;

use Illuminate\Http\Request;
use PhiRakib\InventoryProduct\Models\Brand;
use PhiRakib\InventoryProduct\Controllers\Controller;

class BrandController extends Controller
{
    public function index()
    {
        return Brand::all();
    }

    public function show($id)
    {
        return Brand::findOrFail($id);
    }

    public function store(Request $request)
    {
        Brand::create($request->all());

        return response()->json([
            'message' => 'Brand Created Successfully'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $brand->update($request->all());

        return response()->json(['message' => 'Brand Updated Succesfully']);
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        $brand->delete();

        return response()->json(['message' => 'Brand Deleted Successfully'], 204);
    }
}
