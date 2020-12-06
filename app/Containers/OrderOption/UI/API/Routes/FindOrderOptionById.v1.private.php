<?php

/**
 * @apiGroup           OrderOption
 * @apiName            findOrderOptionById
 *
 * @api                {GET} /v1/order_option/:id Endpoint title here..
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
$router->get('order_option/{id}', [
    'as' => 'api_orderoption_find_order_option_by_id',
    'uses'  => 'Controller@findOrderOptionById',
    'middleware' => [
      'auth:api',
    ],
]);
