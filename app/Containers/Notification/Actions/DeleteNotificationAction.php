<?php

namespace App\Containers\Notification\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteNotificationAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Notification@DeleteNotificationTask', [$request->id]);
    }
}
