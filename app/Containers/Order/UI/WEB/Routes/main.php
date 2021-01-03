<?php

$router->get('/quotation/{id}', [
    'as'   => 'get_order_quotation',
    'uses' => 'Controller@getQuotation',
]);

$router->get('/work-order/{id}', [
    'as'   => 'get_order_work_order',
    'uses' => 'Controller@getWorkOrder',
]);

$router->get('/invoice/{id}', [
    'as'   => 'get_order_invoice',
    'uses' => 'Controller@getInvoice',
]);
