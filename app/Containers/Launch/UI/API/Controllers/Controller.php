<?php

namespace App\Containers\Launch\UI\API\Controllers;

use App\Containers\Category\Models\Category;
use App\Containers\Category\UI\API\Transformers\CategoryTransformer;
use App\Containers\Event\Models\Event;
use App\Containers\Event\UI\API\Transformers\EventTransformer;
use App\Containers\Order\Models\Order;
use App\Containers\Settings\Models\Setting;
use App\Containers\Settings\UI\API\Transformers\SettingTransformer;
use App\Containers\User\Models\User;
use App\Ship\Events\SendSMSEvent;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class Controller
 *
 * @package App\Containers\Lawyers\UI\API\Controllers
 */
class Controller extends ApiController {

  /**
   * Launch Api
   *
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function launch( Request $request ) {
    $categories = $this->transform( Category::all(), CategoryTransformer::class );
    $events     = $this->transform( Event::all(), EventTransformer::class );

    $gallery = $this->transform( Setting::find( 1000 ), SettingTransformer::class );
    $splash  = $this->transform( Setting::find( 2000 ), SettingTransformer::class );

    return $this->json( [
      "data" => [
        "settings"   => Setting::all(),
        "gallery"    => $gallery,
        "splash"     => $splash,
        "categories" => $categories['data'],
        "events"     => $events,
      ]
    ] );

  }

  public function dashboard() {
    $user = Auth::user();

    // Orders
    $orders = Order::where( 'status', '!=', 'cancelled' )->get()->count();

    return $this->json( [
      "data" => [
        'clients'      => User::where( 'is_client', '1' )->get()->count(),
        'appointments' => $orders,
      ]
    ] );
  }

  public function contact() {
    return [ "success" => true ];
  }

  public function verificationCode( Request $request ) {
    $user = User::where( 'mobile', $request->username )->first();
    if ( ! $user ) {
      return $this->json( [
        "sent" => false
      ] );
    }

    $code = rand( 11111, 99999 );

    $user->update( [
      'verification_code' => $code
    ] );

    // Send sms
    App::make( Dispatcher::class )->dispatch( new SendSMSEvent( $this->translatable( "Your verification code is", "كود التفعيل الخاص بك هو" ) . " \n " . $code, "966{$user->mobile}" ) );

    return $this->json( [
      "sent" => true
    ] );
  }

  public function verifyCode( Request $request ) {
    $user = User::find( $request->id );

    if ( $user->verification_code != $request->code ) {
      return $this->json( [
        "verified" => false
      ] );
    }

    $user->update( [
      'phone_verified' => 1
    ] );

    return $this->json( [
      "verified" => true
    ] );
  }

  public function resetPassword( Request $request ) {
    $user = User::where( 'mobile', $request->username )->first();
    if ( ! $user or $user->verification_code != $request->code ) {
      return $this->json( [
        "verified" => false
      ] );
    }

    $user->update( [
      'password' => Hash::make( $request->password )
    ] );

    return $this->json( [
      "verified" => true
    ] );
  }

//  public function notifications() {
//    $notifications = Notifications::all();
//
//    return $this->transform( $notifications, NotificationsTransformer::class );
//  }

  public function payment( Request $request ) {
    echo '<script>window.ReactNativeWebView.postMessage("done")</script>';

    return null;
  }

  public function paymentError( Request $request ) {
    echo '<script>window.ReactNativeWebView.postMessage("error")</script>';

    return null;
  }
}
