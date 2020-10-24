<?php

namespace App\Containers\OrderProduct\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteOrderProductAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('OrderProduct@DeleteOrderProductTask', [$request->id]);
    }
}
