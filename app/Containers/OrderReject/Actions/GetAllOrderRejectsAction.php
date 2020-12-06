<?php

namespace App\Containers\OrderReject\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllOrderRejectsAction extends Action
{
    public function run(Request $request)
    {
        $orderrejects = Apiato::call('OrderReject@GetAllOrderRejectsTask', [], ['addRequestCriteria']);

        return $orderrejects;
    }
}
