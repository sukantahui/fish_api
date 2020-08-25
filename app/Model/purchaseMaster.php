<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class purchaseMaster extends Model
{
//    protected $visible = [
//        "id","invoice_number","purchase_date","vendor_id","employee_id","discount","round_off"
//    ];

    protected $hidden = [
        "inforced","created_at","updated_at"
    ];

//    public function vendor()
//    {
<<<<<<< HEAD
//        return $this->belongsTo('App\User','vendor_id');
=======
//        return $this->belongsTo('App\Model\Ledger','vendor_id');
>>>>>>> a0f5d7c488140de0e2dda12eb89467688f9ac7fb
//    }
//    public function employee()
//    {
//        return $this->belongsTo('App\User','employee_id');
//    }
<<<<<<< HEAD
//    public function purchaseDetails(){
//        return $this->hasMany('App\Model\PurchaseDetail','purchase_master_id');
//    }
=======
    public function purchaseDetails(){
        return $this->hasMany('App\Model\PurchaseDetail','purchase_master_id');
    }
>>>>>>> a0f5d7c488140de0e2dda12eb89467688f9ac7fb
}
