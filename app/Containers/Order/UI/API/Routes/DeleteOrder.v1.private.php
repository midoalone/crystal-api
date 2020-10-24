<?php

/**
 * @apiGroup           Order
 * @apiName            deleteOrder
 *
 * @api                {DELETE} /v1/order/:id Endpoint title here..
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
$router->delete('order/{id}', [
    'as' => 'api_order_delete_order',
    'uses'  => 'Controller@deleteOrder',
    'middleware' => [
      'auth:api',
    ],
]);
