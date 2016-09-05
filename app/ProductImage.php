<?php

namespace CodeCommerce;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'extension'
    ];

    public function images(){
        return $this->hasMany('CodeCommerce\ProductImage');
    }

    public function produtc(){
        return $this->belongsTo('CodeCommerce\Product');
    }
}
