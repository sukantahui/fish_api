<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    //
    private $transaction_master_id;
    private $transaction_type_id;
    private $ledger_id;
    private $amount;
    protected $hidden = ["inforce","created_at","updated_at"];
    public function ledger()
    {
        return $this->belongsTo('App\Model\Ledger','ledger_id');
    }
}
