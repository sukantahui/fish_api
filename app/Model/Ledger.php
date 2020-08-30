<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    private $ledger_name;
    private $billing_name;
    private $ledger_group_id;
    private $email;
    private $mobile1;
    private $mobile2;
    private $address1;
    private $address2;
    private $state;
    private $po;
    private $area;
    private $city;
    private $pin;
    private $opening_balance;
    private $transaction_type_id;
    protected $hidden = ["inforce","created_at","updated_at"];
    public function transaction_type()
    {
        return $this->belongsTo('App\Model\TransactionType','transaction_type_id');
    }
}
