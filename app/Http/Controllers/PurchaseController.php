<?php

namespace App\Http\Controllers;

use App\Model\PersonType;
use App\Model\Product;
use App\Model\PurchaseMaster;
use App\Model\PurchaseDetail;
use App\Model\TransactionDetail;
use App\Model\TransactionMaster;
use App\Model\Unit;
use App\Model\Voucher;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{

    public function testPurchase(){
        $test = PurchaseMaster::find(2)->transaction;

//        $test = User::doesnthave('purchases')->where('person_type_id','=',11)->get();
        return response()->json(['success'=>1,'purchase'=>$test], 200,[],JSON_NUMERIC_CHECK);
    }
    public function purchasseById($id){
        $purchaseMaster=PurchaseMaster::find($id);
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

        $purchaseMaster=PurchaseMaster::where('invoice_number', '=', $invoice)->first();
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
    public function savePurchase(Request $request){
        $input=($request->json()->all());
        $inputPurchaseMaster=(object)($input['purchase_master']);
        $inputPurchaseDetails=($input['purchase_details']);
        $inputTransactionMaster=(object)($input['transaction_master']);
        $inputTransactionDetails=($input['transaction_details']);

//        return response()->json(['success'=>1,'data'=>13], 200,[],JSON_NUMERIC_CHECK);

        DB::beginTransaction();
        try{
            //save data into purchase_masters
            $purchaseMaster= new PurchaseMaster();
            $purchaseMaster->discount = $inputPurchaseMaster->discount;
            $purchaseMaster->round_off = $inputPurchaseMaster->round_off;
            $purchaseMaster->loading_n_unloading_expenditure = $inputPurchaseMaster->loading_n_unloading_expenditure;
            $purchaseMaster->save();
            //save data into purchase_details
            foreach($inputPurchaseDetails as $inputPurchaseDetail){
                $purchaseDetail = new PurchaseDetail();
                $purchaseDetail->purchase_master_id = $purchaseMaster->id;
                $purchaseDetail->product_id = $inputPurchaseDetail['product_id'];
                $purchaseDetail->unit_id = $inputPurchaseDetail['unit_id'];
                $purchaseDetail->quantity = $inputPurchaseDetail['quantity'];
                $purchaseDetail->price = $inputPurchaseDetail['price'];
                $purchaseDetail->discount = $inputPurchaseDetail['discount'];
                $purchaseDetail->save();
            }
            //save data into transaction_masters
            $transactionMaster = new TransactionMaster();
            $transactionMaster->transaction_date = $inputTransactionMaster->transaction_date;
            $transactionMaster->transaction_number = $inputTransactionMaster->transaction_number;
            $transactionMaster->voucher_id = $inputTransactionMaster->voucher_id;
            $transactionMaster->purchase_master_id = $purchaseMaster->id;
            $transactionMaster->employee_id = $inputTransactionMaster->employee_id;
            $transactionMaster->save();

            //save data into transaction_details
            foreach($inputTransactionDetails as $inputTransactionDetail){
                $transactionDetail = new TransactionDetail();
                $transactionDetail->transaction_master_id = $transactionMaster->id;
                $transactionDetail->transaction_type_id = $inputTransactionDetail['transaction_type_id'];
                $transactionDetail->ledger_id = $inputTransactionDetail['ledger_id'];
                $transactionDetail->amount = $inputTransactionDetail['amount'];
                $transactionDetail->save();
            }
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['success'=>0,'exception'=>$e->getMessage()], 401);
        }
        $purchaseVoucher=TransactionMaster::join('transaction_details', 'transaction_masters.id', '=', 'transaction_details.transaction_master_id')
            ->join('ledgers', 'ledgers.id', '=', 'transaction_details.ledger_id')
            ->where('transaction_masters.voucher_id', '=', 2)
            ->where('transaction_details.transaction_type_id','=',2)
            ->where('transaction_masters.id','=',$transactionMaster->id)
            ->select('transaction_masters.id'
                ,'transaction_masters.transaction_number'
                , DB::raw('date_format(transaction_masters.transaction_date,"%D %b %Y") as formatted_transaction_date')
                ,'transaction_masters.transaction_date'
                ,'ledgers.ledger_name'
                , DB::raw('get_purchase_amount_by_transaction_master_id(transaction_masters.id) as bill_amount')
            )
            ->first();
        return response()->json(['success'=>1,'data'=>$purchaseVoucher], 200);

//        return response()->json(['Success'=>1,'inputPurchaseMaster'=>$inputPurchaseMaster,'inputPurchaseDetails'=>$inputPurchaseDetails,
//            'inputTransactionMaster'=>$inputTransactionMaster,'inputTransactionDetails'=>$inputTransactionDetails], 200);
    }
    public function getAllPurchases(){
//        $purchaseMasters=TransactionMaster::where('voucher_id','=',2)->orderBy('id', 'desc')->get();
//        foreach ($purchaseMasters as $purchaseMaster){
//            foreach($purchaseMaster->transactionDetails as $transactionDetail){
//                $transactionDetail->ledger->transaction_type;
//            }
//        }


        // To select all Purchase Vouchers
        /*  select
                tm.id
                 ,tm.transaction_number
                 , tm.transaction_date
                 , date_format(tm.transaction_date,'%D %b %Y') as formatted_transaction_date
                 , get_purchase_amount_by_transaction_master_id(tm.id) as bill_amount
                  ,l.ledger_name
            from transaction_masters as tm
            inner join transaction_details td on tm.id = td.transaction_master_id
            inner join ledgers l on td.ledger_id = l.id
            where tm.voucher_id =2 and td.transaction_type_id=2
      */


        $result=TransactionMaster::join('transaction_details', 'transaction_masters.id', '=', 'transaction_details.transaction_master_id')
            ->join('ledgers', 'ledgers.id', '=', 'transaction_details.ledger_id')
            ->where('transaction_masters.voucher_id', '=', 2)
            ->where('transaction_details.transaction_type_id','=',2)
            ->select('transaction_masters.id'
                ,'transaction_masters.transaction_number'
                , DB::raw('date_format(transaction_masters.transaction_date,"%D %b %Y") as formatted_transaction_date')
                ,'transaction_masters.transaction_date'
                ,'ledgers.ledger_name'
                , DB::raw('get_purchase_amount_by_transaction_master_id(transaction_masters.id) as bill_amount')
            )
            ->get();


        return response()->json(['success'=>1,'data'=>$result], 200,[],JSON_NUMERIC_CHECK);
    }
    public function getPurchaseDetailsByTransactionMasterID($id){
//        $transactionMaster = TransactionMaster::where('voucher_id','=',2)->first();
        $transactionMaster=TransactionMaster::find($id);
        foreach($transactionMaster->transactionDetails as $transactionDetail){
            $transactionDetail->ledger->ledger_group;
            $transactionDetail->transaction_type;
        }
        $transactionMaster->purchaseMaster->purchaseDetails;

        return response()->json(['success'=>1,'data'=>$transactionMaster], 200,[],JSON_NUMERIC_CHECK);
    }
}
