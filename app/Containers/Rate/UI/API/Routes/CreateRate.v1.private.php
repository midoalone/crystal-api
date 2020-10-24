<?php

/**
 * @apiGroup           Rate
 * @apiName            createRate
 *
 * @api                {POST} /v1/rate Endpoint title here..
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
$router->post('rate', [
    'as' => 'api_rate_create_rate',
    'uses'  => 'Controller@createRate',
    'middleware' => [
      'auth:api',
    ],
]);
