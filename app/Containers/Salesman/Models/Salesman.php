<?php

namespace App\Containers\Salesman\Models;

use App\Ship\Parents\Models\Model;

#use#

class Salesman extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'phone'
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
    protected $resourceKey = 'salesmen';
    protected $table = 'salesman';

    #relations#
}
