<?php

namespace App\Containers\Address\UI\API\Transformers;

use App\Containers\Address\Models\Address;
use App\Containers\Client\UI\API\Transformers\ClientTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;


class AddressTransformer extends Transformer {
  /**
   * @var  array
   */
  protected $defaultIncludes = [

  ];

  /**
   * @var  array
   */
  protected $availableIncludes = [
    'user',

  ];

  /**
   * @param Address $entity
   *
   * @return array
   */
  public function transform( Address $entity ) {
    $response = [
      'object'     => 'Address',
      'id'         => $entity->getHashedKey(),
      'created_at' => $entity->created_at,
      'updated_at' => $entity->updated_at,

    ];

    // Get values of fillables
    $response = $this->fillables( $entity, $response );

    $response = $this->withMedia( $entity, $response, "image" );
    $response = $this->withMedia( $entity, $response, "gallery" );
    $response = $this->withMedia( $entity, $response, "file" );

    $response = $this->ifAdmin( [
      'real_id' => $entity->id,
      // 'deleted_at' => $entity->deleted_at,
    ], $response );

    return $response;
  }

  public function includeUser( Address $item ) {
    return $this->item( $item->user, new UserTransformer() );
  }


}
