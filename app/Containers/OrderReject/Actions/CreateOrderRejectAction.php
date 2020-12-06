<?php

namespace App\Containers\OrderReject\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateOrderRejectAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $orderreject = Apiato::call('OrderReject@CreateOrderRejectTask', [$data]);

        return $orderreject;
    }
}
