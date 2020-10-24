<?php

namespace App\Containers\Product\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateProductAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->all();
        $product = Apiato::call('Product@CreateProductTask', [$data]);

        return $product;
    }
}
