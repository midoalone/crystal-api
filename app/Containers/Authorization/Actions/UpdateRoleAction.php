<?php

namespace App\Containers\Authorization\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateRoleAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $branch = Apiato::call('Authorization@UpdateRoleTask', [$request->id, $data]);

        return $branch;
    }
}
