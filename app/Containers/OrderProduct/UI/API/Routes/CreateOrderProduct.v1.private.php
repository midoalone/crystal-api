<?php

/**
 * @apiGroup           OrderProduct
 * @apiName            createOrderProduct
 *
 * @api                {POST} /v1/order_product Endpoint title here..
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
$router->post('order_product', [
    'as' => 'api_orderproduct_create_order_product',
    'uses'  => 'Controller@createOrderProduct',
    'middleware' => [
      'auth:api',
    ],
]);
