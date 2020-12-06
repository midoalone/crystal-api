<?php

namespace App\Containers\OrderOption\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\OrderProduct\Models\OrderProduct;
use App\Containers\Option\Models\Option;


class OrderOption extends Model
{
    protected $fillable = [
      #Fillables#
		'order_product_id',
		 'option_id',
		 'price'
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
    protected $resourceKey = 'orderoptions';
    protected $table = 'order_option';

    public function product()
    {
        return $this->belongsTo(OrderProduct::class, 'order_product_id');
    }

    public function option()
    {
        return $this->belongsTo(Option::class, 'option_id');
    }


}
