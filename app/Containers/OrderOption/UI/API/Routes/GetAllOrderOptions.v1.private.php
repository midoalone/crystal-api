<?php

/**
 * @apiGroup           OrderOption
 * @apiName            getAllOrderOptions
 *
 * @api                {GET} /v1/order_option Endpoint title here..
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
$router->get('order_option', [
    'as' => 'api_orderoption_get_all_order_options',
    'uses'  => 'Controller@getAllOrderOptions',
    'middleware' => [
      'auth:api',
    ],
]);
