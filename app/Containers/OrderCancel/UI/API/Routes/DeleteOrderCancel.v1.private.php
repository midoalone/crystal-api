<?php

/**
 * @apiGroup           OrderCancel
 * @apiName            deleteOrderCancel
 *
 * @api                {DELETE} /v1/order_cancel/:id Endpoint title here..
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
$router->delete('order_cancel/{id}', [
    'as' => 'api_ordercancel_delete_order_cancel',
    'uses'  => 'Controller@deleteOrderCancel',
    'middleware' => [
      'auth:api',
    ],
]);
