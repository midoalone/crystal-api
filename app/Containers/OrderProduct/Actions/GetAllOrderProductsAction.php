<?php

namespace App\Containers\OrderProduct\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllOrderProductsAction extends Action
{
    public function run(Request $request)
    {
        $orderproducts = Apiato::call('OrderProduct@GetAllOrderProductsTask', [], ['addRequestCriteria']);

        return $orderproducts;
    }
}
