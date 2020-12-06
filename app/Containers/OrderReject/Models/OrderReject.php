<?php

namespace App\Containers\OrderReject\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\RejectReason\Models\RejectReason;
use App\Containers\Order\Models\Order;


class OrderReject extends Model
{
    protected $fillable = [
      #Fillables#
		'reason_id',
		 'order_id',
		 'review'
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
    protected $resourceKey = 'orderrejects';
    protected $table = 'order_reject';

    public function reason()
    {
        return $this->belongsTo(RejectReason::class, 'reason_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }


}
