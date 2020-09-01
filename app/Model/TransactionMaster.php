<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionMaster extends Model
{

    private $id;
    private $transaction_date;
    private $transaction_number;
    private $voucher_id;
    private $purchase_master_id;
    private $sale_master_id;
    private $employee_id;
    protected $hidden = ["inforce","created_at","updated_at"];
    public function voucher()
    {
        return $this->belongsTo('App\Model\Voucher','voucher_id');
    }
    public function transactionDetails() {
        return $this->hasMany('App\Model\TransactionDetail', 'transaction_master_id')->where('transaction_type_id','=',2);
    }
    public function creditTransactionDetails() {
        return $this->hasMany('App\Model\TransactionDetail', 'transaction_master_id')->where('transaction_type_id','=',2);
    }
    public function purchaseMaster(){
        return $this->belongsTo('App\Model\PurchaseMaster','purchase_master_id');
    }
}
