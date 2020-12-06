<?php

namespace App\Containers\Settings\Actions;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Actions\Action;

/**
 * Class UpdateSettingAction
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class UpdateSettingAction extends Action {

  /**
   *
   * @return  mixed
   */
  public function run() {
    $settings = [];
    foreach ( request()->all() as $key => $value ) {
      $settings[] = Apiato::call( 'Settings@UpdateSettingsByKeyTask', [ $key, $value ] );
    }

    return $settings;
  }
}
