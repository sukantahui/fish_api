<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    //
    /**
     * @var mixed
     */
    private $sale_master_id;
    /**
     * @var mixed
     */
    private $product_id;
    /**
     * @var mixed
     */
    private $unit_id;
    /**
     * @var mixed
     */
    private $quantity;
    /**
     * @var mixed
     */
    private $price;
    /**
     * @var mixed
     */
    private $discount;
}
