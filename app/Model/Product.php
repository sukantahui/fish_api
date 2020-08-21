<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    protected $fillable = ['product_code','product_name','product_category_id'];
    use Notifiable;
    protected $guarded = ['id'];
    protected $hidden = [
        "inforced","created_at","updated_at"
    ];

    private $product_code;
    private $product_name;
    private $product_category_id;


    public function category()
    {
        return $this->belongsTo('App\Model\ProductCategory','product_category_id');
    }
}
