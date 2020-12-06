<?php

namespace App\Containers\OrderCancel\UI\API\Controllers;

use App\Containers\OrderCancel\UI\API\Requests\CreateOrderCancelRequest;
use App\Containers\OrderCancel\UI\API\Requests\DeleteOrderCancelRequest;
use App\Containers\OrderCancel\UI\API\Requests\GetAllOrderCancelsRequest;
use App\Containers\OrderCancel\UI\API\Requests\FindOrderCancelByIdRequest;
use App\Containers\OrderCancel\UI\API\Requests\UpdateOrderCancelRequest;
use App\Containers\OrderCancel\UI\API\Transformers\OrderCancelTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\OrderCancel\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateOrderCancelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrderCancel(CreateOrderCancelRequest $request)
    {
        $ordercancel = Apiato::call('OrderCancel@CreateOrderCancelAction', [$request]);

        $this->uploadMedia( $ordercancel, "image", true );
        $this->uploadMedia( $ordercancel, "gallery" );
        $this->uploadMedia( $ordercancel, "file" );

        return $this->created($this->transform($ordercancel, OrderCancelTransformer::class));
    }

    /**
     * @param FindOrderCancelByIdRequest $request
     * @return array
     */
    public function findOrderCancelById(FindOrderCancelByIdRequest $request)
    {
        $ordercancel = Apiato::call('OrderCancel@FindOrderCancelByIdAction', [$request]);

        return $this->transform($ordercancel, OrderCancelTransformer::class);
    }

    /**
     * @param GetAllOrderCancelsRequest $request
     * @return array
     */
    public function getAllOrderCancels(GetAllOrderCancelsRequest $request)
    {
        $ordercancels = Apiato::call('OrderCancel@GetAllOrderCancelsAction', [$request]);

        return $this->transform($ordercancels, OrderCancelTransformer::class);
    }

    /**
     * @param UpdateOrderCancelRequest $request
     * @return array
     */
    public function updateOrderCancel(UpdateOrderCancelRequest $request)
    {
        $ordercancel = Apiato::call('OrderCancel@UpdateOrderCancelAction', [$request]);

        $this->uploadMedia( $ordercancel, "image", true );
        $this->uploadMedia( $ordercancel, "gallery" );
        $this->uploadMedia( $ordercancel, "file" );

        return $this->transform($ordercancel, OrderCancelTransformer::class);
    }

    /**
     * @param DeleteOrderCancelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOrderCancel(DeleteOrderCancelRequest $request)
    {
        Apiato::call('OrderCancel@DeleteOrderCancelAction', [$request]);

        return $this->noContent();
    }
}
