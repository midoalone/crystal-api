<?php

namespace App\Containers\Address\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Client\Models\Client;


class Address extends Model
{
    protected $fillable = [
      #Fillables#
		'client_id',
		 'address'
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
    protected $resourceKey = 'addresses';
    protected $table = 'address';

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }


}
