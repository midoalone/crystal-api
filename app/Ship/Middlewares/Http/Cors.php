<?php

namespace App\Ship\Middlewares\Http;

use Closure;

class Cors {
  public function handle( $request, Closure $next ) {
    return $next( $request )
      ->header( 'Access-Control-Allow-Origin', '*' )
      ->header( 'Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, DELETE, OPTIONS' )
      ->header( 'Access-Control-Allow-Headers', '*' );
  }
}
