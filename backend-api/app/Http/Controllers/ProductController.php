<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        try {
            $product = new Product;
            $product->name = $request->name;
            $product->color = $request->color;
            $product->email = $request->email;
            $product->phone = $request->phone;
            $product->save();
            return response()->json([
                'message' => 'Product added'
            ], 201);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json([
                'message' => 'Server error'
            ], 500);
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json($product);
        } else {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->name = $request->input('name', $product->name);
            $product->color = $request->input('color', $product->color);
            $product->email = $request->input('email', $product->email);
            $product->phone = $request->input('phone', $product->phone);
            $product->save();
            return response()->json([
                'message' => 'Product updated'
            ]);
        } else {
            return response()->json([
                'message' => 'Product not found'
            ], 404);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                "message" => "Product deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Product not found"
            ], 404);
        }
    }
}
