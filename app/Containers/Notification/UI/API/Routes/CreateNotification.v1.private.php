<?php

/**
 * @apiGroup           Notification
 * @apiName            createNotification
 *
 * @api                {POST} /v1/notification Endpoint title here..
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
$router->post('notification', [
    'as' => 'api_notification_create_notification',
    'uses'  => 'Controller@createNotification',
    'middleware' => [
      'auth:api',
    ],
]);
