<?php

namespace App\Containers\OrderReject\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class OrderRejectRepository
 */
class OrderRejectRepository extends Repository
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
