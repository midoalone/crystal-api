<?php

namespace App\Containers\Rate\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllRatesAction extends Action
{
    public function run(Request $request)
    {
        $rates = Apiato::call('Rate@GetAllRatesTask', [], ['addRequestCriteria']);

        return $rates;
    }
}
