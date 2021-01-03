<?php

namespace App\Containers\Order\Tasks;

use App\Containers\Order\Data\Repositories\OrderRepository;
use App\Ship\Criterias\Eloquent\ThisUserCriteria;
use App\Ship\Criterias\Eloquent\UserOrdersCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllOrdersTask extends Task {

  protected $repository;

  public function __construct( OrderRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {
    if ( request( 'requestedBy' ) == 'mobile' ) {
      $this->repository->pushCriteria( new UserOrdersCriteria );
      $this->repository->pushCriteria( new ThisUserCriteria );
    }

    return $this->repository->paginate();
  }
}
