<?php

namespace App\Containers\Notification\Models;

use App\Ship\Parents\Models\Model;

#use#

class Notification extends Model {
  protected $fillable = [
    #Fillables#
    'message_ar',
    'title',
    'message',
    'title_ar',
    'user_id',
    'data'
  ];

  protected $attributes = [

  ];

  protected $hidden = [

  ];

  protected $casts = [
    "data" => 'array'
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
  protected $resourceKey = 'notifications';
  protected $table = 'app_notification';

  #relations#
}
