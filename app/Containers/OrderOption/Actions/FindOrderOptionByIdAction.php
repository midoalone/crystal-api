<?php

namespace App\Containers\OrderOption\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindOrderOptionByIdAction extends Action
{
    public function run(Request $request)
    {
        $orderoption = Apiato::call('OrderOption@FindOrderOptionByIdTask', [$request->id]);

        return $orderoption;
    }
}
