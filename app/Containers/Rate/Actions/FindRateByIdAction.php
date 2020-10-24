<?php

namespace App\Containers\Rate\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindRateByIdAction extends Action
{
    public function run(Request $request)
    {
        $rate = Apiato::call('Rate@FindRateByIdTask', [$request->id]);

        return $rate;
    }
}
