<?php

namespace App\Http\Controllers;

use App\Model\CustomerCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerCategory = CustomerCategory::select('id','customer_category_name')->where('id','>',1)->get();
        return response()->json(['success'=>1,'data'=>$customerCategory], 200,[],JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\CustomerCategory  $customerCategory
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerCategory $customerCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\CustomerCategory  $customerCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerCategory $customerCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\CustomerCategory  $customerCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerCategory $customerCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\CustomerCategory  $customerCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerCategory $customerCategory)
    {
        //
    }
}
