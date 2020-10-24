<?php

/**
 * @apiGroup           Product
 * @apiName            updateProduct
 *
 * @api                {POST} /v1/product/:id Endpoint title here..
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
$router->post('product/{id}', [
    'as' => 'api_product_update_product',
    'uses'  => 'Controller@updateProduct',
    'middleware' => [
      'auth:api',
    ],
]);
