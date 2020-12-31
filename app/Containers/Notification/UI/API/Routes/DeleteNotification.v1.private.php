<?php

/**
 * @apiGroup           Notification
 * @apiName            deleteNotification
 *
 * @api                {DELETE} /v1/notification/:id Endpoint title here..
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
$router->delete('notification/{id}', [
    'as' => 'api_notification_delete_notification',
    'uses'  => 'Controller@deleteNotification',
    'middleware' => [
      'auth:api',
    ],
]);
