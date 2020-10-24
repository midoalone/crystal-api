<?php

/**
 * @apiGroup           Address
 * @apiName            createAddress
 *
 * @api                {POST} /v1/address Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->post('address', [
    'as' => 'api_address_create_address',
    'uses'  => 'Controller@createAddress',
    'middleware' => [
      'auth:api',
    ],
]);
