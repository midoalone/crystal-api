<?php

/**
 * @apiGroup           OrderOption
 * @apiName            createOrderOption
 *
 * @api                {POST} /v1/order_option Endpoint title here..
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
$router->post('order_option', [
    'as' => 'api_orderoption_create_order_option',
    'uses'  => 'Controller@createOrderOption',
    'middleware' => [
      'auth:api',
    ],
]);
