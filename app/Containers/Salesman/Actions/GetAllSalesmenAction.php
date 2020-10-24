<?php

namespace App\Containers\Salesman\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllSalesmenAction extends Action
{
    public function run(Request $request)
    {
        $salesmen = Apiato::call('Salesman@GetAllSalesmenTask', [], ['addRequestCriteria']);

        return $salesmen;
    }
}
