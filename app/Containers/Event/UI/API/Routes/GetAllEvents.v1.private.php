<?php

/**
 * @apiGroup           Event
 * @apiName            getAllEvents
 *
 * @api                {GET} /v1/event Endpoint title here..
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
$router->get('event', [
    'as' => 'api_event_get_all_events',
    'uses'  => 'Controller@getAllEvents',
    'middleware' => [
      'auth:api',
    ],
]);
