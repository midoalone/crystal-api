<?php

/**
 * @apiGroup           OrderCancel
 * @apiName            getAllOrderCancels
 *
 * @api                {GET} /v1/order_cancel Endpoint title here..
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
$router->get('order_cancel', [
    'as' => 'api_ordercancel_get_all_order_cancels',
    'uses'  => 'Controller@getAllOrderCancels',
    'middleware' => [
      'auth:api',
    ],
]);
