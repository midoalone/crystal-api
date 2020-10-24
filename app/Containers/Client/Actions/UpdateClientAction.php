<?php

namespace App\Containers\Client\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateClientAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $client = Apiato::call('Client@UpdateClientTask', [$request->id, $data]);

        return $client;
    }
}
