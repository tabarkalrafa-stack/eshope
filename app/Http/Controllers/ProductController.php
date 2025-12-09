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
        $products=Product::all();
        return[
            'status'=>'success',
            'message'=>'all products',
            'data'=>$products
        ];
    }

    public function store(StoreProductRequest $request)
    {
        $product=Product::create($request->all());
        return[
            'status'=>'success',
            'message'=>' add new product successfuly',
            'data'=>$product
        ];
    }

    public function show(Product $product)
    {
        return [
            'status' => 'success',
            'message' => 'Product details',
            'data' => $product
        ];
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return [
            'status' => 'success',
            'message' => 'Product updated successfully',
            'data' => $product
        ];
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return [
            'status' => 'success',
            'message' => 'product deleted successfully',
            'data' => $product
        ];
    }
    public function getByName(Request $request){
        $name=$request->name;
        $products=Product::where('name','like',"%$name%")->get();
        return[
            'status'=>'success',
            'message'=>'products by name',
            'data'=>$products
        ];
    }
    public function getByCategory(Request $request){
        $category_id=$request->category_id;
        $products=Product::where('category_id',$category_id)->get();
        return[
            'status'=>'success',
            'message'=>'products by category',
            'data'=>$products
        ];
    }
}