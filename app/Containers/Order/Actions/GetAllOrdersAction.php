<?php

namespace App\Containers\Order\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllOrdersAction extends Action
{
    public function run(Request $request)
    {
        $orders = Apiato::call('Order@GetAllOrdersTask', [], ['addRequestCriteria']);

        return $orders;
    }
}
