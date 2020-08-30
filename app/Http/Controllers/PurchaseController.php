<?php

namespace App\Http\Controllers;

use App\Model\PersonType;
use App\Model\Product;
use App\Model\purchaseMaster;
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
        return response()->json(['success'=>1,'data'=>$transactionMaster->id], 200);

//        return response()->json(['Success'=>1,'inputPurchaseMaster'=>$inputPurchaseMaster,'inputPurchaseDetails'=>$inputPurchaseDetails,
//            'inputTransactionMaster'=>$inputTransactionMaster,'inputTransactionDetails'=>$inputTransactionDetails], 200);
    }
    public function getAllPurchases(){
        $transactions = Voucher::find(2)->transactionMasters;
        foreach ($transactions as $transaction){
            $transaction->setAttribute('transaction_details', $transaction->transactionDetails);
        }
        return response()->json(['success'=>1,'data'=>$transactions], 200,[],JSON_NUMERIC_CHECK);
    }
}
