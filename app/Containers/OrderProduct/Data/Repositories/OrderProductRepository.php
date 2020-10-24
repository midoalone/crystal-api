<?php

namespace App\Containers\OrderProduct\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class OrderProductRepository
 */
class OrderProductRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'order_id' => '=',
'product_id' => '=',
'quantity' => 'like',
'total' => 'like',

    ];

}
