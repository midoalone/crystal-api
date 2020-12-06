<?php

namespace App\Containers\OrderOption\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class OrderOptionRepository
 */
class OrderOptionRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'order_product_id' => '=',
'option_id' => '=',
'price' => 'like',

    ];

}
