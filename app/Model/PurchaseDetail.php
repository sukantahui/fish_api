<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{


    private $purchase_master_id;
    private $product_id;
    private $unit_id;
    private $quantity;
    private $price;
    private $discount;
    protected $hidden = ["inforce","created_at","updated_at"];
}
