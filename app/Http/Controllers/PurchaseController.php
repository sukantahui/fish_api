<?php

namespace App\Http\Controllers;

use App\Model\PersonType;
use App\Model\Product;
use App\Model\purchaseMaster;
use App\Model\PurchaseDetail;
use App\Model\Unit;
use App\User;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function testPurchase(){
        $test = purchaseMaster::find(2)->transaction;

//        $test = User::doesnthave('purchases')->where('person_type_id','=',11)->get();
        return response()->json(['success'=>1,'purchase'=>$test], 200,[],JSON_NUMERIC_CHECK);
    }
    public function purchasseById($id){
        $purchaseMaster=purchaseMaster::find($id);
        $purchaseMaster->setAttribute('vendor', $purchaseMaster->vendor);
        $purchaseMaster->purchaseDetails;
        $total_amount=0;
        foreach ($purchaseMaster->purchaseDetails as $value) {
            $amount=($value->quantity * $value->price)-$value->discount;
            $total_amount+=$amount;
            $value->setAttribute('amount',$amount);
            $product = Product::find($value->product_id);
            $value->setAttribute('product',$product);
            $unit = Unit::find($value->unit_id);
            $value->setAttribute('unit',$unit);

        }
        $purchaseMaster->setAttribute('total_amount', $total_amount);
        return response()->json(['success'=>1,'purchase'=>$purchaseMaster], 200,[],JSON_NUMERIC_CHECK);
    }
    public function purchaseByInvoice($invoice){
        //$purchaseMaster=purchaseMaster::find($id);

        $purchaseMaster=purchaseMaster::where('invoice_number', '=', $invoice)->first();
        $purchaseMaster->setAttribute('vendor', $purchaseMaster->vendor);
        $purchaseMaster->purchaseDetails;
        $total_amount=0;
        foreach ($purchaseMaster->purchaseDetails as $value) {
            $amount=($value->quantity * $value->price)-$value->discount;
            $total_amount+=$amount;
            $value->setAttribute('amount',$amount);
            $product = Product::find($value->product_id);
            $value->setAttribute('product',$product);
            $unit = Unit::find($value->unit_id);
            $value->setAttribute('unit',$unit);

        }
        $purchaseMaster->setAttribute('total_amount', $total_amount);
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
