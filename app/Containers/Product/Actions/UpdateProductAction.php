<?php

namespace App\Containers\Product\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateProductAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $product = Apiato::call('Product@UpdateProductTask', [$request->id, $data]);

        return $product;
    }
}
