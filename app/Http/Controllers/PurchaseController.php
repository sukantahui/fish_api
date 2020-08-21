<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Model\purchaseMaster;
use App\Model\PurchaseDetail;
use App\Model\Unit;
use App\User;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function testPurchase($id){
        $purchaseMaster=purchaseMaster::find($id);
        $purchaseMaster->setAttribute('vendor', $purchaseMaster->vendor);
        $purchaseMaster->setAttribute('purchaseDetails', $purchaseMaster->purchaseDetails);
        foreach ($purchaseMaster->purchaseDetails as $value) {
            $product = Product::find($value->product_id);
            $value->setAttribute('product',$product);
            $unit = Unit::find($value->unit_id);
            $value->setAttribute('unit',$unit);
        }

        return response()->json(['success'=>1,'purchase'=>$purchaseMaster], 200,[],JSON_NUMERIC_CHECK);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Model\purchaseMaster  $purchaseMaster
     * @return \Illuminate\Http\Response
     */
    public function show(purchaseMaster $purchaseMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\purchaseMaster  $purchaseMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(purchaseMaster $purchaseMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\purchaseMaster  $purchaseMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, purchaseMaster $purchaseMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\purchaseMaster  $purchaseMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(purchaseMaster $purchaseMaster)
    {
        //
    }
}
