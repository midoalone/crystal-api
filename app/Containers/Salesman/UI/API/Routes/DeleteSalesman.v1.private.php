<?php

/**
 * @apiGroup           Salesman
 * @apiName            deleteSalesman
 *
 * @api                {DELETE} /v1/salesman/:id Endpoint title here..
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
$router->delete('salesman/{id}', [
    'as' => 'api_salesman_delete_salesman',
    'uses'  => 'Controller@deleteSalesman',
    'middleware' => [
      'auth:api',
    ],
]);
