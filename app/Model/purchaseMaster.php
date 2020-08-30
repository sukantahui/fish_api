<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class purchaseMaster extends Model
{
    protected $visible = [
        "id","invoice_number","purchase_date","vendor_id","employee_id","discount","round_off"
    ];

    protected $hidden = [
        "inforced","created_at","updated_at"
    ];
    private $discount;
    private $round_off;
    private $loading_n_unloading_expenditure;

    public function vendor()
    {
        return $this->belongsTo('App\User','vendor_id');
    }
    public function employee()
    {
        return $this->belongsTo('App\User','employee_id');
    }
    public function purchaseDetails(){
        return $this->hasMany('App\Model\PurchaseDetail','purchase_master_id');
    }
    public function transaction(){
        return $this->hasManyThrough(TransactionMaster::class, TransactionDetail::class,'purchase_master_id','transaction_master_id');
    }
}
