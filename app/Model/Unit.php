<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $visible = [
        'id','unit_name','formal_name','parent_id','parent_conversion','position','active'
    ];
}
