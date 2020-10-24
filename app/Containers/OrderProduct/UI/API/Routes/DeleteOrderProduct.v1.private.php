<?php

/**
 * @apiGroup           OrderProduct
 * @apiName            deleteOrderProduct
 *
 * @api                {DELETE} /v1/order_product/:id Endpoint title here..
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
$router->delete('order_product/{id}', [
    'as' => 'api_orderproduct_delete_order_product',
    'uses'  => 'Controller@deleteOrderProduct',
    'middleware' => [
      'auth:api',
    ],
]);
