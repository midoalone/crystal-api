<?php

/**
 * @apiGroup           Rate
 * @apiName            getAllRates
 *
 * @api                {GET} /v1/rate Endpoint title here..
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
$router->get('rate', [
    'as' => 'api_rate_get_all_rates',
    'uses'  => 'Controller@getAllRates',
    'middleware' => [
      'auth:api',
    ],
]);
