<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get()->all();
        return response()->json($products);
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->color = $request->color;
        $product->email = $request->email;
        $product->phone = $request->phone;
        $product->save();
        return response()->json([
            'message product added'
        ], 201);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if(!empty($product)){
            return response($product);
        }else{
            return response()->json([
                'product not found'
            ], 404);
        };
    }


    public function update(UpdateProductRequest $request, $id)
    {
        if(Product::where('id', $id)){
            $product = Product::find($id);
            $product->name = is_null($request->name) ? $product->name : $request->name;
            $product->phone = is_null($request->phone) ? $product->phone : $request->phone;
            $product->email = is_null($request->email) ? $product->email : $request->email;
            $product->color = is_null($request->color) ? $product->color : $request->color;
            $product->save();
            return response()->json([
                'product not found'
            ], 404);
        }else{
            return response()->json([
                'product not found'
            ], 404);
        }
    }

    public function destroy($id)
    {
        if(Product::where('id', $id)->exists()){
            $product = Product::find($id);
            $product->save();

            return response()->json([
                "message" => "destroyed"
            ], 202);
        }else{
            return response()->json([
                "message" => "not destroyed"
            ], 404);
        }
    }
}
