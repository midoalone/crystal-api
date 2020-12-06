<?php

/**
 * @apiGroup           OrderReject
 * @apiName            updateOrderReject
 *
 * @api                {POST} /v1/order_reject/:id Endpoint title here..
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
$router->post('order_reject/{id}', [
    'as' => 'api_orderreject_update_order_reject',
    'uses'  => 'Controller@updateOrderReject',
    'middleware' => [
      'auth:api',
    ],
]);
