<?php

/**
 * @apiGroup           OrderReject
 * @apiName            findOrderRejectById
 *
 * @api                {GET} /v1/order_reject/:id Endpoint title here..
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
$router->get('order_reject/{id}', [
    'as' => 'api_orderreject_find_order_reject_by_id',
    'uses'  => 'Controller@findOrderRejectById',
    'middleware' => [
      'auth:api',
    ],
]);
