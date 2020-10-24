<?php

/**
 * @apiGroup           Order
 * @apiName            getAllOrders
 *
 * @api                {GET} /v1/order Endpoint title here..
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
$router->get('order', [
    'as' => 'api_order_get_all_orders',
    'uses'  => 'Controller@getAllOrders',
    'middleware' => [
      'auth:api',
    ],
]);
