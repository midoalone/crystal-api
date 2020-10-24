<?php

/**
 * @apiGroup           Event
 * @apiName            createEvent
 *
 * @api                {POST} /v1/event Endpoint title here..
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
$router->post('event', [
    'as' => 'api_event_create_event',
    'uses'  => 'Controller@createEvent',
    'middleware' => [
      'auth:api',
    ],
]);
