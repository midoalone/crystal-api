<?php

namespace App\Containers\Salesman\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class SalesmanRepository
 */
class SalesmanRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'phone' => 'like',

    ];

}
