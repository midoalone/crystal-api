<?php

namespace App\Containers\Offers\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindSettingByIdAction extends Action
{
    public function run(Request $request)
    {
        $settings = Apiato::call('Settings@FindSettingByIdTask', [$request->id]);

        return $settings;
    }
}
