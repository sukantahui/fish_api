<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products=Product::select('products.id','product_name','products.product_code','products.product_category_id','product_categories.category_name')
            ->join('product_categories', 'product_categories.id', '=', 'products.product_category_id')
            ->get();
        return response()->json(['success'=>1,'data'=>$products], 200,[],JSON_NUMERIC_CHECK);
    }

    public function saveProduct(Request $request)
    {
        $product=new Product();
        $product->product_code=$request->input('product_code');
        $product->product_name=$request->input('product_name');
        $product->product_category_id=$request->input('product_category_id');
        $product->save();

        $product->setAttribute('category_name', $product->category->category_name);
        return response()->json(['success'=>1,'data'=>$product], 200,[],JSON_NUMERIC_CHECK);
    }
    public function updateProduct(Request $request)
    {
        $product=new Product();
        $product=Product::find($request->input('id'));
        $product->product_code=$request->input('product_code');
        $product->product_name=$request->input('product_name');
        $product->product_category_id=$request->input('product_category_id');
        $product->update();
        $product->setAttribute('category_name', $product->category->category_name);
        return response()->json(['success'=>1,'data'=>$product], 200,[],JSON_NUMERIC_CHECK);
    }

    public function updateProductByID(Request $request,$id)
    {
        $product=new Product();
        $product=Product::find($id);
        $product->product_code=$request->input('product_code');
        $product->product_name=$request->input('product_name');
        $product->product_category_id=$request->input('product_category_id');
        $product->update();
        return response()->json(['success'=>1,'data'=>$product], 200,[],JSON_NUMERIC_CHECK);
    }


    public function deleteProduct(Request $request,$id)
    {
        $product = Product::find($id);
        $result=$product->delete();
        return response()->json(['success'=>$result,'id'=>$id], 200);
    }
}
