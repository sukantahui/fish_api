<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function getProductCategories()
    {
        $data = ProductCategory::has('products')->get();
        return response()->json(['success'=>1,'data'=>$data], 200,[],JSON_NUMERIC_CHECK);
    }

    public function saveProductCategory(Request $request)
    {
        $ProductCategory=new ProductCategory();
        $ProductCategory->category_name=$request->input('category_name');
        $ProductCategory->save();
        return response()->json(['success'=>1,'data'=>$ProductCategory], 200,[],JSON_NUMERIC_CHECK);
    }
    public function updateProductCategory(Request $request)
    {
        $productCategory=new ProductCategory();
        $productCategory=ProductCategory::find($request->input('id'));
        $productCategory->category_name=$request->input('category_name');
        $productCategory->update();
        return response()->json(['success'=>1,'data'=>$productCategory], 200,[],JSON_NUMERIC_CHECK);
    }

    public function updateProductCategoryByID($id,Request $request)
    {
        $productCategory=new ProductCategory();
        $productCategory=ProductCategory::find($id);
        $productCategory->category_name=$request->input('category_name');
        $productCategory->update();
        return response()->json(['success'=>1,'data'=>$productCategory], 200,[],JSON_NUMERIC_CHECK);
    }
}
