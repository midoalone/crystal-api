<?php

/**
 * @apiGroup           Product
 * @apiName            getAllProducts
 *
 * @api                {GET} /v1/product Endpoint title here..
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
$router->get('product', [
    'as' => 'api_product_get_all_products',
    'uses'  => 'Controller@getAllProducts',
    'middleware' => [
      'auth:api',
    ],
]);
