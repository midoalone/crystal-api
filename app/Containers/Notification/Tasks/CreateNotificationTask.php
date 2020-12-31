<?php

namespace App\Containers\Notification\Tasks;

use App\Containers\Notification\Data\Repositories\NotificationRepository;
use App\Ship\Events\UserNotificationEvent;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;

class CreateNotificationTask extends Task {

  protected $repository;

  public function __construct( NotificationRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {
    $repository = $this->repository->create( $data );

    // Send push notification
    App::make( Dispatcher::class )->dispatch( new UserNotificationEvent( $data ) );

    return $repository;
  }
}

