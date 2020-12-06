<?php

/**
 * @apiGroup           Lawyers
 * @apiName            createLawyers
 *
 * @api                {POST} /v1/lawyers Endpoint title here..
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
$router->get('launch', [
    'as' => 'api_launch',
    'uses'  => 'Controller@launch',
]);

$router->get('dashboard', [
    'as' => 'api_dashboard',
    'uses'  => 'Controller@dashboard',
    'middleware' => [
      'auth:api',
    ],
]);

$router->get('payment/confirm', [
    'as' => 'api_launch_confirm',
    'uses'  => 'Controller@payment',
]);

$router->get('payment/error', [
    'as' => 'api_launch_error',
    'uses'  => 'Controller@paymentError',
]);

//$router->get('notifications', [
//    'as' => 'api_launch_notifications',
//    'uses'  => 'Controller@notifications',
//]);

/**
 * Check user appointments
 */
$router->post('check/appointments', [
    'as' => 'api_check_user_appointments',
    'uses'  => 'Controller@checkUserAppointments',
    'middleware' => [
      'auth:api',
    ],
]);

$router->post('contact', [
    'as' => 'api_launch_contact',
    'uses'  => 'Controller@contact',
]);


$router->post('password-reset', [
    'as' => 'api_launch_reset_password',
    'uses'  => 'Controller@resetPassword',
]);


$router->post('verification-code', [
    'as' => 'api_launch_verification_code',
    'uses'  => 'Controller@verificationCode',
]);

$router->get('verify-code', [
  'as' => 'api_launch_verify_code',
  'uses'  => 'Controller@verifyCode',
]);
