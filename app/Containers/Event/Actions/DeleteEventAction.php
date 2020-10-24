<?php

namespace App\Containers\Event\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteEventAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Event@DeleteEventTask', [$request->id]);
    }
}
