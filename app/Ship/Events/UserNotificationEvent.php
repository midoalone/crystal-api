<?php

namespace App\Ship\Events;

use App\Containers\Notifications\Models\Notifications;
use App\Containers\User\Models\User;
use App\Ship\Mails\UserNotificationMail;
use App\Ship\Parents\Events\Event;
use Illuminate\Contracts\Queue\ShouldQueue;
use OneSignal;
use Mail;

class UserNotificationEvent extends Event implements ShouldQueue {


  protected $message;
  protected $user;
  protected $data;

  /**
   * UserRegisteredNotification constructor.
   *
   * @param $message
   * @param $user
   * @param null $data
   */
  public function __construct( $message, $user, $data = null ) {
    $this->message = $message;
    $this->user = $user;
    $this->data = $data;
  }

  /**
   * Handle the Event. (Single Listener Implementation)
   */
  public function handle() {
    $message = $this->message;
    $user = $this->user;
    $data = $this->data;

    // Push notification
    if($user) {
      $userObject = User::find($user);

      if($userObject->player_id) {
        OneSignal::sendNotificationToUser(
          $message['message'],
          $userObject->player_id,
          $url = null,
          $data = [
            "data" => $data
          ],
          $buttons = null,
          $schedule = null
        );
      }

      Mail::send(new UserNotificationMail($userObject, $message['message']));
    }else{
      OneSignal::sendNotificationToAll(
        $message['message'],
        $url = null,
        $data = [
          "data" => $data
        ],
        $buttons = null,
        $schedule = null
      );
    }
  }
}
