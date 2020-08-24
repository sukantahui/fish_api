<?php

namespace App\Http\Controllers;

use App\Model\PersonType;
use App\Model\Product;
use App\Model\purchaseMaster;
use App\Model\PurchaseDetail;
use App\Model\Unit;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function testPurchase(){

        $test = User::doesnthave('purchases')->where('person_type_id','=',11)->get();
        return response()->json(['success'=>1,'purchase'=>$test], 200,[],JSON_NUMERIC_CHECK);
    }
    
}
