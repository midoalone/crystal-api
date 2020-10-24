<?php

/**
 * @apiGroup           Rate
 * @apiName            findRateById
 *
 * @api                {GET} /v1/rate/:id Endpoint title here..
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
$router->get('rate/{id}', [
    'as' => 'api_rate_find_rate_by_id',
    'uses'  => 'Controller@findRateById',
    'middleware' => [
      'auth:api',
    ],
]);
