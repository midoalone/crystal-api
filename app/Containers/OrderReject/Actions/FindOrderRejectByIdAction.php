<?php

namespace App\Containers\OrderReject\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindOrderRejectByIdAction extends Action
{
    public function run(Request $request)
    {
        $orderreject = Apiato::call('OrderReject@FindOrderRejectByIdTask', [$request->id]);

        return $orderreject;
    }
}
