<?php

/**
 * @apiGroup           OrderProduct
 * @apiName            getAllOrderProducts
 *
 * @api                {GET} /v1/order_product Endpoint title here..
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
$router->get('order_product', [
    'as' => 'api_orderproduct_get_all_order_products',
    'uses'  => 'Controller@getAllOrderProducts',
    'middleware' => [
      'auth:api',
    ],
]);
