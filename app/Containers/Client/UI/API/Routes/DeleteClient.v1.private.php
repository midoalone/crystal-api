<?php

/**
 * @apiGroup           Client
 * @apiName            deleteClient
 *
 * @api                {DELETE} /v1/client/:id Endpoint title here..
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
$router->delete('client/{id}', [
    'as' => 'api_client_delete_client',
    'uses'  => 'Controller@deleteClient',
    'middleware' => [
      'auth:api',
    ],
]);
