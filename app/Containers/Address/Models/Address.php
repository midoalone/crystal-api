<?php

namespace App\Containers\Address\Models;

use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;


class Address extends Model {
  protected $fillable = [
    #Fillables#
    'user_id',
    'address',
    'latitude',
    'longitude'
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

  public function user() {
    return $this->belongsTo( User::class, 'user_id' );
  }


}
