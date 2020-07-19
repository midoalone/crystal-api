<?php


namespace App\Ship\Mails;

use App\Containers\User\Models\User;
use App\Ship\Parents\Mails\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserNotificationMail extends Mail implements ShouldQueue {
  use Queueable;

  protected $user;
  protected $message;

  public function __construct( User $user, $message ) {
    $this->user = $user;
    $this->message = $message;
  }

  public function build() {
    return $this->view( 'user::user-notification' )
                ->subject("Subject")
                ->to( "email@mail.com", $this->user->name )
                ->with( [
                  'name' => $this->user->name,
                  'text' => $this->message,
                ] );
  }
}
