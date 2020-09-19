<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
	
    //
    public function savePayment(Request $request){
		$input=($request->json()->all());
		$inputTransactionMaster=(object)($input['transaction_master']);
		$inputTransactionDetails=$input['transaction_details'];
		
		DB::beginTransaction();
		try{
			//save data into transaction_masters
			$transactionMaster = new TransactionMaster();
			$transactionMaster->transaction_date = $inputTransactionMaster->transaction_date;
			$transactionMaster->transaction_number = $inputTransactionMaster->transaction_number;
			$transactionMaster->voucher_id = $inputTransactionMaster->voucher_id;
			$transactionMaster->employee_id = $inputTransactionMaster->employee_id;
			$transactionMaster->save();

			//save data into transaction_details
			foreach ($inputTransactionDetails as $inputTransactionDetail) {
				$transactionDetail = new TransactionDetail();
				$transactionDetail->transaction_master_id = $transactionMaster->id;
				$transactionDetail->transaction_type_id = $inputTransactionDetail['transaction_type_id'];
				$transactionDetail->ledger_id = $inputTransactionDetail['ledger_id'];
				$transactionDetail->amount = $inputTransactionDetail['amount'];
				$transactionDetail->save();
			}
			DB::commit();
		} catch (\Exception $e) {
			DB::rollBack();
			return response()->json(['success'=>0,'exception'=>$e->getMessage()], 401);
		}
		return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
    }
}
