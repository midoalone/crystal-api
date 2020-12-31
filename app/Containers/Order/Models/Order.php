<?php

namespace App\Containers\Order\Models;

use App\Containers\Address\Models\Address;
use App\Containers\Client\Models\Client;
use App\Containers\Event\Models\Event;
use App\Containers\Product\Models\Product;
use App\Containers\Rate\Models\Rate;
use App\Containers\Salesman\Models\Salesman;
use App\Containers\User\Models\User;
use App\Ship\Parents\Models\Model;


class Order extends Model {
  protected $fillable = [
    #Fillables#
    'salesman_id',
    'client_id',
    'event_id',
    'attendees_number',
    'attendees_type',
    'date',
    'from',
    'to',
    'address_id',
    'subtotal',
    'vat',
    'total',
    'paid',
    'due',
    'status',
    'user_id',
    'refund_amount',
    'down_payment'
  ];

  protected $attributes = [

  ];

  protected $hidden = [

  ];

  protected $casts = [

  ];

  protected $appends = [
    'rated'
  ];

  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at',
  ];

  /**
   * A resource key to be used by the the JSON API Serializer responses.
   */
  protected $resourceKey = 'orders';
  protected $table = 'order';

  public function getRatedAttribute() {
    $rate = Rate::where('order_id', $this->id)->first();
    if($rate) {
      return true;
    }

    return false;
  }

  public function client() {
    return $this->belongsTo( Client::class, 'client_id' );
  }

  public function event() {
    return $this->belongsTo( Event::class, 'event_id' );
  }

  public function products() {
    return $this->belongsToMany( Product::class, 'order_product', 'order_id', 'product_id' );
  }

  public function salesman() {
    return $this->belongsTo( Salesman::class, 'salesman_id' );
  }

  public function user() {
    return $this->belongsTo( User::class, 'user_id' );
  }

  public function address() {
    return $this->belongsTo( Address::class, 'address_id' );
  }


}
