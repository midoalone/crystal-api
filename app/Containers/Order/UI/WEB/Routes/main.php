<?php

$router->get('/quotation/{id}', [
    'as'   => 'get_order_quotation',
    'uses' => 'Controller@getQuotation',
]);
