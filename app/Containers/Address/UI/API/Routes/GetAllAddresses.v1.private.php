<?php

/**
 * @apiGroup           Address
 * @apiName            getAllAddresses
 *
 * @api                {GET} /v1/address Endpoint title here..
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
$router->get('address', [
    'as' => 'api_address_get_all_addresses',
    'uses'  => 'Controller@getAllAddresses',
    'middleware' => [
      'auth:api',
    ],
]);
