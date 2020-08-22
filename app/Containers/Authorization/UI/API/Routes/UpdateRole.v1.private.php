<?php

/**
 * @apiGroup           RolePermission
 * @apiName            updateRole
 * @api                {post} /v1/roles/{id} Update a Role
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 *
 * @apiParam           {String} name Unique Role Name
 * @apiParam           {String} [description]
 * @apiParam           {String} [display_name]
 *
 * @apiUse             RoleSuccessSingleResponse
 */

$router->post('roles/{id}', [
    'as' => 'api_authorization_update_role',
    'uses'       => 'Controller@updateRole',
    'middleware' => [
        'auth:api',
    ],
]);
