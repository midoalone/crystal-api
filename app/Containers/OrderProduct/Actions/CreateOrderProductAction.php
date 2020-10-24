<?php

namespace App\Containers\OrderProduct\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateOrderProductAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $orderproduct = Apiato::call('OrderProduct@CreateOrderProductTask', [$data]);

        return $orderproduct;
    }
}
