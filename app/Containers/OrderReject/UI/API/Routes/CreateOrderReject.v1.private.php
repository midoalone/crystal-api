<?php

/**
 * @apiGroup           OrderReject
 * @apiName            createOrderReject
 *
 * @api                {POST} /v1/order_reject Endpoint title here..
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
$router->post('order_reject', [
    'as' => 'api_orderreject_create_order_reject',
    'uses'  => 'Controller@createOrderReject',
    'middleware' => [
      'auth:api',
    ],
]);
