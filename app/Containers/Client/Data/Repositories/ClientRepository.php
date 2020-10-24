<?php

namespace App\Containers\Client\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ClientRepository
 */
class ClientRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'like',
'last_name' => 'like',
'mobile' => 'like',
'email' => 'like',
'password' => 'like',

    ];

}
