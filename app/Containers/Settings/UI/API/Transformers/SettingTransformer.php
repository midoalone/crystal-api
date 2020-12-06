<?php

namespace App\Containers\Settings\UI\API\Transformers;

use App\Containers\Settings\Models\Setting;
use App\Ship\Parents\Transformers\Transformer;

class SettingTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [
  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
  ];

  /**
   * @param Setting $entity
   *
   * @return array
   */
  public function transform( Setting $entity ) {
    $response = [

      'object' => 'Setting',
      'id'     => $entity->id,

      'key'   => $entity->key,
      'value' => $entity->value,
    ];

    $response = $this->withMedia( $entity, $response, "gallery" );
    $response = $this->withMedia( $entity, $response, "image" );

    $response = $this->ifAdmin( [
      'real_id' => $entity->id,
    ], $response );

    return $response;
  }
}
