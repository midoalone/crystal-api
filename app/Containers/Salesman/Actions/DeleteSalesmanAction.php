<?php

namespace App\Containers\Salesman\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteSalesmanAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Salesman@DeleteSalesmanTask', [$request->id]);
    }
}
