<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionMaster extends Model
{
    /**
     * @var mixed
     */
    private $transaction_date;
    /**
     * @var mixed
     */
    private $transaction_number;
    /**
     * @var mixed
     */
    private $voucher_id;
    /**
     * @var mixed
     */
    private $purchase_master_id;
    /**
     * @var mixed
     */
    private $employee_id;

    public function voucher()
    {
        return $this->belongsTo('App\Model\Voucher','voucher_id');
    }
    public function transactionDetails() {
        return $this->hasMany('App\Model\TransactionDetail', 'transaction_master_id');
    }
}
