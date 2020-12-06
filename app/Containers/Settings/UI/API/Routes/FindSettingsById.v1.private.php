<?php

/**
 * @apiGroup           Offers
 * @apiName            findOffersById
 *
 * @api                {GET} /v1/offers/:id Endpoint title here..
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
$router->get('settings/{id}', [
    'as' => 'api_settings_find_setting_by_id',
    'uses'  => 'Controller@findSettingById',
    'middleware' => [
      //'auth:api',
    ],
]);
