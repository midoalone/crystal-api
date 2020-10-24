<?php

namespace App\Containers\OrderProduct\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindOrderProductByIdAction extends Action
{
    public function run(Request $request)
    {
        $orderproduct = Apiato::call('OrderProduct@FindOrderProductByIdTask', [$request->id]);

        return $orderproduct;
    }
}
