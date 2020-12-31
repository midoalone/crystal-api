<?php

namespace App\Containers\Notification\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateNotificationAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $notification = Apiato::call('Notification@UpdateNotificationTask', [$request->id, $data]);

        return $notification;
    }
}
