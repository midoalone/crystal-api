<?php

/**
 * @apiGroup           OrderCancel
 * @apiName            findOrderCancelById
 *
 * @api                {GET} /v1/order_cancel/:id Endpoint title here..
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
$router->get('order_cancel/{id}', [
    'as' => 'api_ordercancel_find_order_cancel_by_id',
    'uses'  => 'Controller@findOrderCancelById',
    'middleware' => [
      'auth:api',
    ],
]);
