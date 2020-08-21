<?php

namespace App\Http\Controllers;

use App\Model\purchaseMaster;
use App\User;
use Illuminate\Http\Request;

class PurchaseMasterController extends Controller
{
    public function testPurchase($id){
        $purchase=purchaseMaster::find($id)->vendor;

        return response()->json(['success'=>1,'data'=>$purchase], 200,[],JSON_NUMERIC_CHECK);
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
