<?php

namespace App\Containers\Notification\Tasks;

use App\Containers\Notification\Data\Repositories\NotificationRepository;
use App\Ship\Criterias\Eloquent\ThisUserCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllNotificationsTask extends Task {

  protected $repository;

  public function __construct( NotificationRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {
    if ( request( 'requestedBy' ) == "mobile" ) {
      $this->repository->pushCriteria( new ThisUserCriteria() );
    }

    return $this->repository->paginate();
  }
}
