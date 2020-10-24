<?php

namespace App\Containers\Order\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class OrderRepository
 */
class OrderRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'salesman_id' => '=',
'client_id' => '=',
'event_id' => '=',
'attendees_number' => '=',
'attendees_type' => '=',
'date' => '=',
'from' => 'like',
'to' => 'like',
'address_id' => '=',
'subtotal' => 'like',
'vat' => '=',
'total' => 'like',
'paid' => '=',
'due' => 'like',
'status' => '=',
'user_id' => '=',
'refund_amount' => 'like',
'down_payment' => 'like',

    ];

}
