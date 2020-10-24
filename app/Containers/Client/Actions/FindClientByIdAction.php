<?php

namespace App\Containers\Client\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindClientByIdAction extends Action
{
    public function run(Request $request)
    {
        $client = Apiato::call('Client@FindClientByIdTask', [$request->id]);

        return $client;
    }
}
