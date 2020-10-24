<?php

namespace App\Containers\OrderProduct\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Order\Models\Order;
use App\Containers\Product\Models\Product;


class OrderProduct extends Model
{
    protected $fillable = [
      #Fillables#
		'order_id',
		 'product_id',
		 'quantity',
		 'total'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $appends = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'orderproducts';
    protected $table = 'order_product';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


}
