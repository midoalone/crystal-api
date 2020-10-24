<?php

namespace App\Containers\Order\UI\API\Controllers;

use App\Containers\Order\UI\API\Requests\CreateOrderRequest;
use App\Containers\Order\UI\API\Requests\DeleteOrderRequest;
use App\Containers\Order\UI\API\Requests\GetAllOrdersRequest;
use App\Containers\Order\UI\API\Requests\FindOrderByIdRequest;
use App\Containers\Order\UI\API\Requests\UpdateOrderRequest;
use App\Containers\Order\UI\API\Transformers\OrderTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Order\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrder(CreateOrderRequest $request)
    {
        $order = Apiato::call('Order@CreateOrderAction', [$request]);

        $this->uploadMedia( $order, "image", true );
        $this->uploadMedia( $order, "gallery" );
        $this->uploadMedia( $order, "file" );

        return $this->created($this->transform($order, OrderTransformer::class));
    }

    /**
     * @param FindOrderByIdRequest $request
     * @return array
     */
    public function findOrderById(FindOrderByIdRequest $request)
    {
        $order = Apiato::call('Order@FindOrderByIdAction', [$request]);

        return $this->transform($order, OrderTransformer::class);
    }

    /**
     * @param GetAllOrdersRequest $request
     * @return array
     */
    public function getAllOrders(GetAllOrdersRequest $request)
    {
        $orders = Apiato::call('Order@GetAllOrdersAction', [$request]);

        return $this->transform($orders, OrderTransformer::class);
    }

    /**
     * @param UpdateOrderRequest $request
     * @return array
     */
    public function updateOrder(UpdateOrderRequest $request)
    {
        $order = Apiato::call('Order@UpdateOrderAction', [$request]);

        $this->uploadMedia( $order, "image", true );
        $this->uploadMedia( $order, "gallery" );
        $this->uploadMedia( $order, "file" );

        return $this->transform($order, OrderTransformer::class);
    }

    /**
     * @param DeleteOrderRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOrder(DeleteOrderRequest $request)
    {
        Apiato::call('Order@DeleteOrderAction', [$request]);

        return $this->noContent();
    }
}
