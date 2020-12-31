<?php

namespace App\Containers\Notification\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindNotificationByIdAction extends Action
{
    public function run(Request $request)
    {
        $notification = Apiato::call('Notification@FindNotificationByIdTask', [$request->id]);

        return $notification;
    }
}
