<?php

namespace App\Containers\Order\Tasks;

use App\Containers\Order\Data\Repositories\OrderRepository;
use App\Containers\Order\Models\Order;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Auth;

class CreateOrderTask extends Task {

  protected $repository;

  public function __construct( OrderRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {

    // Clean all drafts
    if($data['status'] == 'draft') {
      $user = Auth::user()->id;
      Order::where('user_id', $user)->where('status', 'draft')->delete();
    }

    $repository = $this->repository->create( $data );

    if ( request()->has( "products" ) ) {
      $repository->products()->sync( request( "products" ) );
    }


    return $repository;
  }
}

