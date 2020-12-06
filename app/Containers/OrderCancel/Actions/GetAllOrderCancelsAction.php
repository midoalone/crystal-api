<?php

namespace App\Containers\OrderCancel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllOrderCancelsAction extends Action
{
    public function run(Request $request)
    {
        $ordercancels = Apiato::call('OrderCancel@GetAllOrderCancelsTask', [], ['addRequestCriteria']);

        return $ordercancels;
    }
}
