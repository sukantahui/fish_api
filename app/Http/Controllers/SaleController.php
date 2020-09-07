<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    //
	public function saveSale(Request $request)
	{
		
		
		return response()->json(['success'=>1,'request'=>$request], 200,[],JSON_NUMERIC_CHECK);
    }
}
