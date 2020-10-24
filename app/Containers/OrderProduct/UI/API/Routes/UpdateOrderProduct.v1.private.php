<?php

/**
 * @apiGroup           OrderProduct
 * @apiName            updateOrderProduct
 *
 * @api                {POST} /v1/order_product/:id Endpoint title here..
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
$router->post('order_product/{id}', [
    'as' => 'api_orderproduct_update_order_product',
    'uses'  => 'Controller@updateOrderProduct',
    'middleware' => [
      'auth:api',
    ],
]);
