<?php

namespace App\Containers\Rate\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteRateAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Rate@DeleteRateTask', [$request->id]);
    }
}
