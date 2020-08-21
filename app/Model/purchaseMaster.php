<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class purchaseMaster extends Model
{
    //

    public function vendor()
    {
        return $this->belongsTo('App\User','vendor_id');
    }
}
