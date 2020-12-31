<?php

namespace App\Containers\Notification\UI\CLI\Commands;

use App\Containers\Order\Models\Order;
use App\Containers\User\Models\User;
use App\Ship\Events\UserNotificationEvent;
use App\Ship\Parents\Commands\ConsoleCommand;
use Carbon\Carbon;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\App;

/**
 * Class ScheduledNotificationsCommand
 *
 * @author  Mohamed Tawfik <contact@mohamedtawfik.me>
 */
class ScheduledNotificationsCommand extends ConsoleCommand {

  protected $signature = 'cron:notifications:schedule';

  protected $description = 'Send specialized notifications to users on certain events';

  /**
   * @void
   */
  public function handle() {

    // Appointments reminder
    $orders = Order::whereDate( 'date', Carbon::tomorrow() )
                   ->whereIn( 'status', [ 'booked', 'new' ] )
                   ->where( 'reminder_sent', 0 )
                   ->get();

    foreach ( $orders as $order ) {
      $order->update( [
        "reminder_sent" => 1
      ] );

      $user = User::find( $order->user_id );
      $id   = $order->id;
      $day  = Carbon::parse( $order->date )->format( "d-m-Y" );
      $time = $order->slots[0]->slot->from_hour;

      $mobile = "011-2931455";

      App::make( Dispatcher::class )->dispatch( new UserNotificationEvent( [
        "language"   => $user->language,
        "title"      => "Reminder about order #$id",
        "title_ar"   => "تذكير بخصوص  طلبك #$id",
        "message_ar" => "مرحبًا $user->name! هذا تذكير بموعدك في بلش نيل بوتيك يوم ($day) الساعة($time) لأية استفسارات يرجى الاتصال بنا على $mobile",
        "message"    => "Hello $user->name! this is a reminder of your appointment at Plush Nail Boutique on ($day) at ($time) for any inquiries please contact us on $mobile"
      ], $user->id ) );
    }

    // Birthday reminder
    $users = User::whereMonth( 'birth_date', Carbon::today()->month )
                 ->whereDay( 'birth_date', Carbon::today()->day )
                 ->where( function ( $query ) {
                   $query->whereDate( 'birthday_congrats', '!=', Carbon::today() )->orWhereNull( 'birthday_congrats' );
                 } )->get();

    foreach ( $users as $user ) {
      $user->update( [
        'birthday_congrats' => Carbon::today()
      ] );

      App::make( Dispatcher::class )->dispatch( new UserNotificationEvent( [
        "language"   => $user->language,
        "title"      => "Happy birthday",
        "title_ar"   => "عيد ميلاد سعيد",
        "message_ar" => "مرحبًا $user->name تود عائلة بلش أن تتمنى لك عيد ميلاد سعيدًا!",
        "message"    => "Hello $user->name! The Plush family would like to wish you a very happy birthday!"
      ], $user->id ) );
    }
  }
}
