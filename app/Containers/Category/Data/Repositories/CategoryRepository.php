<?php

namespace App\Containers\Category\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CategoryRepository
 */
class CategoryRepository extends Repository
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
'parent_id' => '=',

    ];

}
