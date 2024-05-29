<?php

namespace PhiRakib\InventoryProduct\Controllers;

use Illuminate\Http\Request;
use PhiRakib\InventoryProduct\Models\Brand;

class BrandController
{
    public function index()
    {
        return Brand::all();
    }

    public function show(Brand $brand)
    {
        return $brand;
    }

    public function store(Request $request)
    {
        Brand::create($request->all());

        return response()->json([
            'message' => 'Brand Created Successfully'
        ], 201);
    }
    
    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->all());

        return response()->json(['message' => 'Brand Updated Succesfully']);
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response()->json(['message' => 'Brand Deleted Successfully']);
    }
}