<?php

namespace App\Containers\Order\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindOrderByIdAction extends Action
{
    public function run(Request $request)
    {
        $order = Apiato::call('Order@FindOrderByIdTask', [$request->id]);

        return $order;
    }
}
