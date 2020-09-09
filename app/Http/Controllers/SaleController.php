<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\SaleMaster;
use App\Model\SaleDetail;
use App\Model\TransactionMaster;
use App\Model\TransactionDetail;
use App\Model\CustomVoucher;
class SaleController extends Controller
{
    //
	public function saveSale(Request $request)
	{
		$input=($request->json()->all());
		$inputSaleMaster=(object)($input['sale_master']);
		$inputSaleDetails=$input['sale_details'];
		$inputTransactionMaster=(object)($input['transaction_master']);
		$inputTransactionDetails=$input['transaction_details'];
		$result =array();
		DB::beginTransaction();
        $customVoucher=CustomVoucher::where('voucher_name',"order")->Where('accounting_year',"2020")->first();

        if($customVoucher) {
            $customVoucher->last_counter = $customVoucher->last_counter + 1;
            $customVoucher->save();
        }else{
            $customVoucher= new CustomVoucher();
            $customVoucher->voucher_name="Sale";
//            $customVoucher->accounting_year=$inputOrderMaster->accounting_year;
            $customVoucher->accounting_year="2020";
            $customVoucher->last_counter=1;
            $customVoucher->delimiter='-';
            $customVoucher->prefix='FIS';
            $customVoucher->save();
        }
        $voucher_number = "FISH-".$customVoucher->last_counter."-"."2020";
        $result['custom_voucher'] = $customVoucher;
		try{

				//save data into purchase_masters
				$saleMaster= new SaleMaster();
				$saleMaster->discount = $inputSaleMaster->discount;
				$saleMaster->round_off = $inputSaleMaster->round_off;
				$saleMaster->loading_n_unloading_expenditure = $inputSaleMaster->loading_n_unloading_expenditure;
				$saleMaster->save();
                $result['sale_master'] = $saleMaster;
				//save data into sale_details
				foreach ($inputSaleDetails as $inputSaleDetail) {
					$saleDetail = new SaleDetail();
					$saleDetail->sale_master_id = $saleMaster->id;
					$saleDetail->product_id = $inputSaleDetail['product_id'];
					$saleDetail->unit_id = $inputSaleDetail['unit_id'];
					$saleDetail->quantity = $inputSaleDetail['quantity'];
					$saleDetail->price = $inputSaleDetail['price'];
					$saleDetail->discount = $inputSaleDetail['discount'];
					$saleDetail->save();
				}
				//save data into transaction_masters
				$transactionMaster = new TransactionMaster();
				$transactionMaster->transaction_date = $inputTransactionMaster->transaction_date;
				$transactionMaster->transaction_number = $voucher_number;
				$transactionMaster->voucher_id = $inputTransactionMaster->voucher_id;
				$transactionMaster->sale_master_id = $saleMaster->id;
				$transactionMaster->employee_id = $inputTransactionMaster->employee_id;
				$transactionMaster->save();
                $result['transaction_master'] = $transactionMaster;

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
			}
			catch (\Exception $e) {
				DB::rollBack();
				return response()->json(['success'=>0,'exception'=>$e->getMessage()], 401);
		}

				return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
		/*return response()->json(['inputSaleMaster'=>$inputSaleMaster,'inputSaleDetails'=>$inputSaleDetails,'inputTransactionMaster'=>$inputTransactionMaster,'inputTransactionDetails'=>$inputTransactionDetails], 200,[],JSON_NUMERIC_CHECK);*/
    }
}
