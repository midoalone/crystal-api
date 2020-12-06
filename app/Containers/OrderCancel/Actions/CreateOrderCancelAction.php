<?php

namespace App\Containers\OrderCancel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateOrderCancelAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $ordercancel = Apiato::call('OrderCancel@CreateOrderCancelTask', [$data]);

        return $ordercancel;
    }
}
