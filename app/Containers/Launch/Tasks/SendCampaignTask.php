<?php

namespace App\Containers\Launch\Tasks;

use App\Containers\Campaign\Data\Repositories\CampaignRepository;
use App\Ship\Parents\Tasks\Task;
use Mail;

class SendCampaignTask extends Task {

  protected $repository;

  public function __construct( CampaignRepository $repository ) {
    $this->repository = $repository;
  }

  public function run( array $data ) {

    $emails = [ 'contact@mohamedtawfik.me', 'midoalone2001@gmail.com' ];

    foreach ($emails as $email) {
      Mail::send( 'launch::campaign', ["text" => $data['content']], function ( $message ) use ( $email, $data ) {
        $message->from('info@plushnail-boutique.com', 'Plush Nail Boutique');
        $message->to( $email )->subject( $data['title'] );
      } );
    }

    $repository = $this->repository->create($data);

    return $repository;
  }
}

