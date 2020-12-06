<?php

namespace App\Containers\OrderOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteOrderOptionAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('OrderOption@DeleteOrderOptionTask', [$request->id]);
    }
}
