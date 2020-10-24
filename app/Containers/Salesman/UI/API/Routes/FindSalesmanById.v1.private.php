<?php

/**
 * @apiGroup           Salesman
 * @apiName            findSalesmanById
 *
 * @api                {GET} /v1/salesman/:id Endpoint title here..
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
$router->get('salesman/{id}', [
    'as' => 'api_salesman_find_salesman_by_id',
    'uses'  => 'Controller@findSalesmanById',
    'middleware' => [
      'auth:api',
    ],
]);
