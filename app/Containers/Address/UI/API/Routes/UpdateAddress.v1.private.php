<?php

/**
 * @apiGroup           Address
 * @apiName            updateAddress
 *
 * @api                {POST} /v1/address/:id Endpoint title here..
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
$router->post('address/{id}', [
    'as' => 'api_address_update_address',
    'uses'  => 'Controller@updateAddress',
    'middleware' => [
      'auth:api',
    ],
]);
