<?php

namespace App\Http\Controllers;

use App\Model\TransactionMaster;
use Illuminate\Http\Request;

class TransactionMasterController extends Controller
{

    public function testTransaction($id)
    {
        $test=TransactionMaster::find($id)->transactionDetails;
        return response()->json(['success'=>1,'result'=>$test], 200,[],JSON_NUMERIC_CHECK);
    }

}
