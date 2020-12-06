<?php

/**
 * @apiGroup           OrderReject
 * @apiName            getAllOrderRejects
 *
 * @api                {GET} /v1/order_reject Endpoint title here..
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
$router->get('order_reject', [
    'as' => 'api_orderreject_get_all_order_rejects',
    'uses'  => 'Controller@getAllOrderRejects',
    'middleware' => [
      'auth:api',
    ],
]);
