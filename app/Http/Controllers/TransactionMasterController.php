<?php

namespace App\Http\Controllers;

use App\Model\TransactionMaster;
use Illuminate\Http\Request;
use App\Model\Voucher;
class TransactionMasterController extends Controller
{

    public function testTransaction($id)
    {
        $test=Voucher::find($id)->transactionMasters;
        return response()->json(['success'=>1,'result'=>$test], 200,[],JSON_NUMERIC_CHECK);
    }

}
