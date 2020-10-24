<?php

namespace App\Containers\Event\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllEventsAction extends Action
{
    public function run(Request $request)
    {
        $events = Apiato::call('Event@GetAllEventsTask', [], ['addRequestCriteria']);

        return $events;
    }
}
