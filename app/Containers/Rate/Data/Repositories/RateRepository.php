<?php

namespace App\Containers\Rate\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class RateRepository
 */
class RateRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'order_id' => '=',
'question1' => 'like',
'question2' => 'like',
'question3' => 'like',
'question4' => 'like',
'question5' => 'like',
'review' => 'like',

    ];

}
