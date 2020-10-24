<?php

namespace App\Containers\Client\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateClientAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $client = Apiato::call('Client@CreateClientTask', [$data]);

        return $client;
    }
}
