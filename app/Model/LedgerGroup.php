<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LedgerGroup extends Model
{
    //
    public function ledgers()
    {
        return $this->hasMany('App\Model\Ledger','ledger_group_id');
    }
}
