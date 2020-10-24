<?php

/**
 * @apiGroup           OrderProduct
 * @apiName            findOrderProductById
 *
 * @api                {GET} /v1/order_product/:id Endpoint title here..
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
$router->get('order_product/{id}', [
    'as' => 'api_orderproduct_find_order_product_by_id',
    'uses'  => 'Controller@findOrderProductById',
    'middleware' => [
      'auth:api',
    ],
]);
