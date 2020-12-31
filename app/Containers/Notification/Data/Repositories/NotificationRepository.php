<?php

namespace App\Containers\Notification\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class NotificationRepository
 */
class NotificationRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'message_ar' => 'like',
'title' => 'like',
'massage' => 'like',
'title_ar' => 'like',

    ];

}
