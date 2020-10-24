<?php

namespace App\Containers\Event\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class EventRepository
 */
class EventRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name_en' => 'like',
'name_ar' => 'like',
'description_en' => 'like',
'description_ar' => 'like',

    ];

}
