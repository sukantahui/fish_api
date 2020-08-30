<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    protected $hidden = ["inforce","created_at","updated_at"];
}
