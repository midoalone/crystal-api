<?php

namespace App\Ship\Parents\Transformers;

use Apiato\Core\Abstracts\Transformers\Transformer as AbstractTransformer;

/**
 * Class Transformer.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class Transformer extends AbstractTransformer {

  public function withMedia( $entity, $response, $name = "logo" ) {

    $medias = $entity->getMedia( $name );
    if ( $medias ) {
      $url = [];
      foreach ($medias as $media) {
        $mediaUrl = $media->getUrl();

        if ( strpos( $mediaUrl, "http" ) === false ) {
          $url[] = "https://{$media->getUrl()}";
        }else{
          $url[] = $mediaUrl;
        }
      }

      if(count($url) === 1) {
        $url = $url[0];
      }

      $response[ $name ] = $url;
    }

    return $response;
  }

  public function fillables($entity, $response) {
    // Get values of fillables
    $fillabeValues = [];
    $fillables = $entity->getFillable();

    foreach ($fillables as $fillable) {
      $fillabeValues[$fillable] = $entity->{$fillable};
    }

    $response = array_merge($response, $fillabeValues);

    return $response;
  }
}
