<?php

/**
 * @apiGroup           Salesman
 * @apiName            getAllSalesmen
 *
 * @api                {GET} /v1/salesman Endpoint title here..
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
$router->get('salesman', [
    'as' => 'api_salesman_get_all_salesmen',
    'uses'  => 'Controller@getAllSalesmen',
    'middleware' => [
      'auth:api',
    ],
]);
