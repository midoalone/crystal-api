<?php

namespace App\Containers\Salesman\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateSalesmanAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $salesman = Apiato::call('Salesman@UpdateSalesmanTask', [$request->id, $data]);

        return $salesman;
    }
}
