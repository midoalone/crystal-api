<?php

namespace App\Containers\Client\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Address\Models\Address;


class Client extends Model
{
    protected $fillable = [
      #Fillables#
		'name',
		 'last_name',
		 'mobile',
		 'email',
		 'password'
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
    protected $resourceKey = 'clients';
    protected $table = 'client';

    public function addresses()
    {
        return $this->hasMany(Address::class, 'client_id');
    }


}
