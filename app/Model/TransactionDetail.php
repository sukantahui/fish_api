<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    //
    /**
     * @var mixed
     */
    private $transaction_master_id;
    /**
     * @var mixed
     */
    private $transaction_type_id;
    /**
     * @var mixed
     */
    private $ledger_id;
    /**
     * @var mixed
     */
    private $amount;
}
