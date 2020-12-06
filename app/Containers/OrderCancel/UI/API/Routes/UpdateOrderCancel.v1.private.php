<?php

/**
 * @apiGroup           OrderCancel
 * @apiName            updateOrderCancel
 *
 * @api                {POST} /v1/order_cancel/:id Endpoint title here..
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
$router->post('order_cancel/{id}', [
    'as' => 'api_ordercancel_update_order_cancel',
    'uses'  => 'Controller@updateOrderCancel',
    'middleware' => [
      'auth:api',
    ],
]);
