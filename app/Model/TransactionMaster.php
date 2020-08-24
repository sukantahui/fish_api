<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionMaster extends Model
{
    public function voucher()
    {
        return $this->belongsTo('App\Model\Voucher','voucher_id');
    }
    public function transactionDetails() {
        return $this->hasMany('App\Model\TransactionDetail', 'transaction_master_id');
    }
}
