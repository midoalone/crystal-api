<?php

namespace App\Containers\Event\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateEventAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $event = Apiato::call('Event@UpdateEventTask', [$request->id, $data]);

        return $event;
    }
}
