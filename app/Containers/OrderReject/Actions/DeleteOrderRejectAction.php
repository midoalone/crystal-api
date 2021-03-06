<?php

namespace App\Containers\OrderReject\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteOrderRejectAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('OrderReject@DeleteOrderRejectTask', [$request->id]);
    }
}
