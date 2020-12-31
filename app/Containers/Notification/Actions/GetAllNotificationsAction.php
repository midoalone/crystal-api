<?php

namespace App\Containers\Notification\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllNotificationsAction extends Action
{
    public function run(Request $request)
    {
        $notifications = Apiato::call('Notification@GetAllNotificationsTask', [], ['addRequestCriteria']);

        return $notifications;
    }
}
