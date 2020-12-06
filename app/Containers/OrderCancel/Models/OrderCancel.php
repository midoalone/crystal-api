<?php

namespace App\Containers\OrderCancel\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\CancelReason\Models\CancelReason;
use App\Containers\Order\Models\Order;


class OrderCancel extends Model
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
    protected $resourceKey = 'ordercancels';
    protected $table = 'order_cancel';

    public function reason()
    {
        return $this->belongsTo(CancelReason::class, 'reason_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }


}
