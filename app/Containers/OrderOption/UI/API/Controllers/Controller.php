<?php

namespace App\Containers\OrderOption\UI\API\Controllers;

use App\Containers\OrderOption\UI\API\Requests\CreateOrderOptionRequest;
use App\Containers\OrderOption\UI\API\Requests\DeleteOrderOptionRequest;
use App\Containers\OrderOption\UI\API\Requests\GetAllOrderOptionsRequest;
use App\Containers\OrderOption\UI\API\Requests\FindOrderOptionByIdRequest;
use App\Containers\OrderOption\UI\API\Requests\UpdateOrderOptionRequest;
use App\Containers\OrderOption\UI\API\Transformers\OrderOptionTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\OrderOption\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateOrderOptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrderOption(CreateOrderOptionRequest $request)
    {
        $orderoption = Apiato::call('OrderOption@CreateOrderOptionAction', [$request]);

        $this->uploadMedia( $orderoption, "image", true );
        $this->uploadMedia( $orderoption, "gallery" );
        $this->uploadMedia( $orderoption, "file" );

        return $this->created($this->transform($orderoption, OrderOptionTransformer::class));
    }

    /**
     * @param FindOrderOptionByIdRequest $request
     * @return array
     */
    public function findOrderOptionById(FindOrderOptionByIdRequest $request)
    {
        $orderoption = Apiato::call('OrderOption@FindOrderOptionByIdAction', [$request]);

        return $this->transform($orderoption, OrderOptionTransformer::class);
    }

    /**
     * @param GetAllOrderOptionsRequest $request
     * @return array
     */
    public function getAllOrderOptions(GetAllOrderOptionsRequest $request)
    {
        $orderoptions = Apiato::call('OrderOption@GetAllOrderOptionsAction', [$request]);

        return $this->transform($orderoptions, OrderOptionTransformer::class);
    }

    /**
     * @param UpdateOrderOptionRequest $request
     * @return array
     */
    public function updateOrderOption(UpdateOrderOptionRequest $request)
    {
        $orderoption = Apiato::call('OrderOption@UpdateOrderOptionAction', [$request]);

        $this->uploadMedia( $orderoption, "image", true );
        $this->uploadMedia( $orderoption, "gallery" );
        $this->uploadMedia( $orderoption, "file" );

        return $this->transform($orderoption, OrderOptionTransformer::class);
    }

    /**
     * @param DeleteOrderOptionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOrderOption(DeleteOrderOptionRequest $request)
    {
        Apiato::call('OrderOption@DeleteOrderOptionAction', [$request]);

        return $this->noContent();
    }
}
