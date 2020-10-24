<?php

/**
 * @apiGroup           Address
 * @apiName            deleteAddress
 *
 * @api                {DELETE} /v1/address/:id Endpoint title here..
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
$router->delete('address/{id}', [
    'as' => 'api_address_delete_address',
    'uses'  => 'Controller@deleteAddress',
    'middleware' => [
      'auth:api',
    ],
]);
