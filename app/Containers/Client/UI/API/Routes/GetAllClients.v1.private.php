<?php

/**
 * @apiGroup           Client
 * @apiName            getAllClients
 *
 * @api                {GET} /v1/client Endpoint title here..
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
$router->get('client', [
    'as' => 'api_client_get_all_clients',
    'uses'  => 'Controller@getAllClients',
    'middleware' => [
      'auth:api',
    ],
]);
