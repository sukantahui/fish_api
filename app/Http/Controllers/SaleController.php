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
		DB::beginTransaction();
		$temp_date = explode("-",$inputTransactionMaster->transaction_date);
        $accounting_year="";
		if($temp_date[1]>3){
            $x = $temp_date[0]%100;
            $accounting_year = $x*100 + ($x+1);
        }else{
            $x = $temp_date[0]%100;
            $accounting_year =($x-1)*100+$x;
        }

        $customVoucher=CustomVoucher::where('voucher_name','=',"Sale")->where('accounting_year',"=",$accounting_year)->first();

        if($customVoucher) {
            $customVoucher->last_counter = $customVoucher->last_counter + 1;
            $customVoucher->save();
        }else{
            $customVoucher= new CustomVoucher();
            $customVoucher->voucher_name="Sale";
//            $customVoucher->accounting_year=$inputOrderMaster->accounting_year;
            $customVoucher->accounting_year= $accounting_year;
            $customVoucher->last_counter=1;
            $customVoucher->delimiter='-';
            $customVoucher->prefix='FIS';
            $customVoucher->save();
        }
        $voucher_number = "FISH-".$customVoucher->last_counter."-".$accounting_year;
		try{

				//save data into purchase_masters
				$saleMaster= new SaleMaster();
				$saleMaster->discount = $inputSaleMaster->discount;
				$saleMaster->round_off = $inputSaleMaster->round_off;
				$saleMaster->loading_n_unloading_expenditure = $inputSaleMaster->loading_n_unloading_expenditure;
				$saleMaster->save();
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

            $result=TransactionMaster::join('transaction_details', 'transaction_masters.id', '=', 'transaction_details.transaction_master_id')
                ->join('ledgers', 'ledgers.id', '=', 'transaction_details.ledger_id')
                ->where('transaction_masters.id', '=', $transactionMaster->id)
                ->where('transaction_masters.voucher_id', '=', 1)
                ->where('transaction_details.transaction_type_id','=',1)
                ->select('transaction_masters.id'
                    ,'transaction_masters.transaction_number'
                    , DB::raw('date_format(transaction_masters.transaction_date,"%D %b %Y") as formatted_transaction_date')
                    ,'transaction_masters.transaction_date'
                    ,'ledgers.ledger_name'
                    , DB::raw('get_sale_amount_by_transaction_master_id(transaction_masters.id) as bill_amount')
                )
                ->get();


				return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
		/*return response()->json(['inputSaleMaster'=>$inputSaleMaster,'inputSaleDetails'=>$inputSaleDetails,'inputTransactionMaster'=>$inputTransactionMaster,'inputTransactionDetails'=>$inputTransactionDetails], 200,[],JSON_NUMERIC_CHECK);*/
    }


    public function getAllSales(){
        $result=TransactionMaster::join('transaction_details', 'transaction_masters.id', '=', 'transaction_details.transaction_master_id')
            ->join('ledgers', 'ledgers.id', '=', 'transaction_details.ledger_id')
            ->where('transaction_masters.voucher_id', '=', 1)
            ->where('transaction_details.transaction_type_id','=',1)
            ->select('transaction_masters.id'
                ,'transaction_masters.transaction_number'
                , DB::raw('date_format(max(transaction_masters.transaction_date),"%D %b %Y") as formatted_transaction_date')
                ,'transaction_masters.transaction_date'
                ,'ledgers.ledger_name'
                , DB::raw('get_sale_amount_by_transaction_master_id(transaction_masters.id) as bill_amount')
            )
            ->groupBy('transaction_masters.id','transaction_masters.transaction_number','ledgers.ledger_name')
            ->get();
        return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
    }

}
