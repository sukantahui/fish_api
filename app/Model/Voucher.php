<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    public function transactionMasters()
    {
        return $this->hasMany('App\Model\TransactionMaster','voucher_id');
    }
}
