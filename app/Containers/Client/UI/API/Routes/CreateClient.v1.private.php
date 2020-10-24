<?php

/**
 * @apiGroup           Client
 * @apiName            createClient
 *
 * @api                {POST} /v1/client Endpoint title here..
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
$router->post('client', [
    'as' => 'api_client_create_client',
    'uses'  => 'Controller@createClient',
    'middleware' => [
      'auth:api',
    ],
]);
