<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
//    protected $visible = [
//        "id","purchase_master_id","product_id","unit_id","quantity","price","discount"
//    ];
    protected $hidden = [
        "inforced","created_at","updated_at"
    ];
}
