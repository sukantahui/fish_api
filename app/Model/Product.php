<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_code','product_name','product_category_id'];

    private $product_code;
    private $product_name;
    private $product_category_id;


    public function category()
    {
        return $this->belongsTo('App\Model\ProductCategory','product_category_id');
    }
}
