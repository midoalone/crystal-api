<?php

namespace App\Containers\OrderOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllOrderOptionsAction extends Action
{
    public function run(Request $request)
    {
        $orderoptions = Apiato::call('OrderOption@GetAllOrderOptionsTask', [], ['addRequestCriteria']);

        return $orderoptions;
    }
}
