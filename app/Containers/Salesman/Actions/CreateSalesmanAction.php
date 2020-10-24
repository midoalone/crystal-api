<?php

namespace App\Containers\Salesman\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateSalesmanAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $salesman = Apiato::call('Salesman@CreateSalesmanTask', [$data]);

        return $salesman;
    }
}
