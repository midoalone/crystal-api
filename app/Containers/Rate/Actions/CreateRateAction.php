<?php

namespace App\Containers\Rate\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateRateAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $rate = Apiato::call('Rate@CreateRateTask', [$data]);

        return $rate;
    }
}
