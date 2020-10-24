<?php

namespace App\Containers\Category\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateCategoryAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $category = Apiato::call('Category@CreateCategoryTask', [$data]);

        return $category;
    }
}
