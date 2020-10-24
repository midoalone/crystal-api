<?php

namespace App\Containers\Client\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteClientAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Client@DeleteClientTask', [$request->id]);
    }
}
