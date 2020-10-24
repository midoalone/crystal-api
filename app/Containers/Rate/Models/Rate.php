<?php

namespace App\Containers\Rate\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Order\Models\Order;


class Rate extends Model
{
    protected $fillable = [
      #Fillables#
		'order_id',
		 'question1',
		 'question2',
		 'question3',
		 'question4',
		 'question5',
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
    protected $resourceKey = 'rates';
    protected $table = 'rate';

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }


}
