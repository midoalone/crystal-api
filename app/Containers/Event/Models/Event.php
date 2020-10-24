<?php

namespace App\Containers\Event\Models;

use App\Ship\Parents\Models\Model;

#use#

class Event extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
		 'description_en',
		 'description_ar'
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
    protected $resourceKey = 'events';
    protected $table = 'event';

    #relations#
}
