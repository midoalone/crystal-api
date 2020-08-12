<?php

/**
 * @apiGroup           CreateBulkPermissions
 * @apiName            bulkCreatePermissions
 * @api                {post} /v1/bulk/permissions Create bulk permissions
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated User
 */

$router->post('bulk/permissions', [
    'as' => 'api_authorization_create_bulk_permissions',
    'uses'       => 'Controller@bulkCreatePermissions',
    'middleware' => [
        'auth:api',
    ],
]);
