<?php

namespace App\Containers\Event\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindEventByIdAction extends Action
{
    public function run(Request $request)
    {
        $event = Apiato::call('Event@FindEventByIdTask', [$request->id]);

        return $event;
    }
}
