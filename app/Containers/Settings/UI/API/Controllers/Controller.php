<?php

namespace App\Containers\Settings\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Settings\Models\Setting;
use App\Containers\Settings\UI\API\Requests\CreateSettingRequest;
use App\Containers\Settings\UI\API\Requests\DeleteSettingRequest;
use App\Containers\Settings\UI\API\Requests\GetAllSettingsRequest;
use App\Containers\Settings\UI\API\Transformers\SettingTransformer;
use App\Ship\Parents\Controllers\ApiController;
use App\Ship\Transporters\DataTransporter;
use Illuminate\Http\Request;

/**
 * Class Controller
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class Controller extends ApiController {

  /**
   * Get All application settings
   *
   * @param GetAllSettingsRequest $request
   *
   * @return mixed
   */
  public function getAllSettings( GetAllSettingsRequest $request ) {
    $settings = Apiato::call( 'Settings@GetAllSettingsAction' );

    return $this->transform( $settings, SettingTransformer::class );
  }

  /**
   * @param Request $request
   *
   * @return array
   */
  public function findSettingById( GetAllSettingsRequest $request ) {
    $settings = Setting::find( $request->id );

    return $this->transform( $settings, SettingTransformer::class );
  }

  /**
   * create a new setting
   *
   * @param CreateSettingRequest $request
   *
   * @return mixed
   */
  public function createSetting( CreateSettingRequest $request ) {
    $setting = Apiato::call( 'Settings@CreateSettingAction', [ new DataTransporter( $request ) ] );

    return $this->transform( $setting, SettingTransformer::class );
  }

  /**
   * Updates an existing setting
   *
   * @return mixed
   */
  public function updateSetting() {
    $settings = [];
    foreach ( request()->except(['gallery', 'image']) as $key => $value ) {
      $settings[] = Apiato::call( 'Settings@UpdateSettingsByKeyTask', [ $key, $value ] );
    }

    return $settings;
  }

  public function updateSettingByID(Request $request) {
    $gallery = Setting::find(1000);

    if(request('gallery')) {
      $this->uploadMedia( $gallery, "gallery" );
    }

    if(request('image')) {
      $gallery = Setting::find(2000);
      $this->uploadMedia( $gallery, "image", true );
    }

    return $this->transform( $gallery, SettingTransformer::class );
  }

  /**
   * Removes a setting
   *
   * @param DeleteSettingRequest $request
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function deleteSetting( DeleteSettingRequest $request ) {
    Apiato::call( 'Settings@DeleteSettingAction', [ new DataTransporter( $request ) ] );

    return $this->noContent();
  }
}
