<?php

namespace App\Containers\Address\Tasks;

use App\Containers\Address\Data\Repositories\AddressRepository;
use App\Ship\Criterias\Eloquent\ThisUserCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllAddressesTask extends Task {

  protected $repository;

  public function __construct( AddressRepository $repository ) {
    $this->repository = $repository;
  }

  public function run() {

    if ( request( 'requestedBy' ) == 'mobile' ) {
      $this->repository->pushCriteria( new ThisUserCriteria );
    }

    return $this->repository->paginate();
  }
}
