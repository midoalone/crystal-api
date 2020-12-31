<?php

/**
 * @apiGroup           Notification
 * @apiName            getAllNotifications
 *
 * @api                {GET} /v1/notification Endpoint title here..
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
$router->get('notification', [
    'as' => 'api_notification_get_all_notifications',
    'uses'  => 'Controller@getAllNotifications',
    'middleware' => [
      'auth:api',
    ],
]);
