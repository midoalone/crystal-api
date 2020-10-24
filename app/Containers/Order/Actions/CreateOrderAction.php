<?php

namespace App\Containers\Order\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateOrderAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $order = Apiato::call('Order@CreateOrderTask', [$data]);

        return $order;
    }
}
