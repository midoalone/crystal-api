<?php

namespace App\Containers\OrderOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateOrderOptionAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $orderoption = Apiato::call('OrderOption@UpdateOrderOptionTask', [$request->id, $data]);

        return $orderoption;
    }
}
