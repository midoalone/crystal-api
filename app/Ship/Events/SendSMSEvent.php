<?php

namespace App\Ship\Events;

use App\Ship\Parents\Events\Event;
use GuzzleHttp\Client;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSMSEvent extends Event implements ShouldQueue {


  protected $message;
  protected $mobile;

  /**
   * SendSMSEvent constructor.
   *
   * @param $message
   * @param $mobile
   */
  public function __construct( $message, $mobile ) {
    $this->message = $message;
    $this->mobile  = $mobile;
  }

  /**
   * Handle the Event. (Single Listener Implementation)
   */
  public function handle() {
    $message = $this->message;
    $mobile  = $this->mobile;

    $client = new Client();

    $provider = config('sms.provider');

    /**
     * HiSMS Provider API
     */
    if($provider == "HiSMS") {
      $client->get( 'https://www.hisms.ws/api.php', [
        'query' => [
          'send_sms' => '1',
          'username' => config('sms.username'),
          'password' => config('sms.password'),
          'sender'   => config('sms.sender'),
          'numbers'  => $mobile,
          'message'  => $message
        ]
      ] );
    }



  }
}
