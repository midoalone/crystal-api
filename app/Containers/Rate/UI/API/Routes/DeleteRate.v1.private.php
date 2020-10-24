<?php

/**
 * @apiGroup           Rate
 * @apiName            deleteRate
 *
 * @api                {DELETE} /v1/rate/:id Endpoint title here..
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
$router->delete('rate/{id}', [
    'as' => 'api_rate_delete_rate',
    'uses'  => 'Controller@deleteRate',
    'middleware' => [
      'auth:api',
    ],
]);
