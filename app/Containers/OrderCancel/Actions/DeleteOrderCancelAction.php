<?php

namespace App\Containers\OrderCancel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteOrderCancelAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('OrderCancel@DeleteOrderCancelTask', [$request->id]);
    }
}
