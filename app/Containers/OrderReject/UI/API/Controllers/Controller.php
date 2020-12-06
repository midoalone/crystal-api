<?php

namespace App\Containers\OrderReject\UI\API\Controllers;

use App\Containers\OrderReject\UI\API\Requests\CreateOrderRejectRequest;
use App\Containers\OrderReject\UI\API\Requests\DeleteOrderRejectRequest;
use App\Containers\OrderReject\UI\API\Requests\GetAllOrderRejectsRequest;
use App\Containers\OrderReject\UI\API\Requests\FindOrderRejectByIdRequest;
use App\Containers\OrderReject\UI\API\Requests\UpdateOrderRejectRequest;
use App\Containers\OrderReject\UI\API\Transformers\OrderRejectTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\OrderReject\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateOrderRejectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrderReject(CreateOrderRejectRequest $request)
    {
        $orderreject = Apiato::call('OrderReject@CreateOrderRejectAction', [$request]);

        $this->uploadMedia( $orderreject, "image", true );
        $this->uploadMedia( $orderreject, "gallery" );
        $this->uploadMedia( $orderreject, "file" );

        return $this->created($this->transform($orderreject, OrderRejectTransformer::class));
    }

    /**
     * @param FindOrderRejectByIdRequest $request
     * @return array
     */
    public function findOrderRejectById(FindOrderRejectByIdRequest $request)
    {
        $orderreject = Apiato::call('OrderReject@FindOrderRejectByIdAction', [$request]);

        return $this->transform($orderreject, OrderRejectTransformer::class);
    }

    /**
     * @param GetAllOrderRejectsRequest $request
     * @return array
     */
    public function getAllOrderRejects(GetAllOrderRejectsRequest $request)
    {
        $orderrejects = Apiato::call('OrderReject@GetAllOrderRejectsAction', [$request]);

        return $this->transform($orderrejects, OrderRejectTransformer::class);
    }

    /**
     * @param UpdateOrderRejectRequest $request
     * @return array
     */
    public function updateOrderReject(UpdateOrderRejectRequest $request)
    {
        $orderreject = Apiato::call('OrderReject@UpdateOrderRejectAction', [$request]);

        $this->uploadMedia( $orderreject, "image", true );
        $this->uploadMedia( $orderreject, "gallery" );
        $this->uploadMedia( $orderreject, "file" );

        return $this->transform($orderreject, OrderRejectTransformer::class);
    }

    /**
     * @param DeleteOrderRejectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOrderReject(DeleteOrderRejectRequest $request)
    {
        Apiato::call('OrderReject@DeleteOrderRejectAction', [$request]);

        return $this->noContent();
    }
}
