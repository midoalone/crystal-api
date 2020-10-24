<?php

namespace App\Containers\Client\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllClientsAction extends Action
{
    public function run(Request $request)
    {
        $clients = Apiato::call('Client@GetAllClientsTask', [], ['addRequestCriteria']);

        return $clients;
    }
}
