<?php

namespace App\Containers\OrderCancel\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class OrderCancelRepository
 */
class OrderCancelRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'reason_id' => '=',
'order_id' => '=',
'review' => 'like',

    ];

}
