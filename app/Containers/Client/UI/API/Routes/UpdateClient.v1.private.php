<?php

/**
 * @apiGroup           Client
 * @apiName            updateClient
 *
 * @api                {POST} /v1/client/:id Endpoint title here..
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
$router->post('client/{id}', [
    'as' => 'api_client_update_client',
    'uses'  => 'Controller@updateClient',
    'middleware' => [
      'auth:api',
    ],
]);
