<?php

namespace App\Containers\OrderCancel\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindOrderCancelByIdAction extends Action
{
    public function run(Request $request)
    {
        $ordercancel = Apiato::call('OrderCancel@FindOrderCancelByIdTask', [$request->id]);

        return $ordercancel;
    }
}
