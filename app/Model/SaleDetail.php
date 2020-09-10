<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
   public function saleDetails(){
       return $this->hasMany('sale_master_id');
   }
}
