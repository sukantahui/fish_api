<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LedgerGroup extends Model
{
    protected $hidden = [
        "inforce","created_at","updated_at"
    ];
    public function ledgers()
    {
        return $this->hasMany('App\Model\Ledger','ledger_group_id');
    }
}
