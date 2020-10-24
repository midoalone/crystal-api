<?php

namespace App\Containers\OrderProduct\UI\API\Controllers;

use App\Containers\OrderProduct\UI\API\Requests\CreateOrderProductRequest;
use App\Containers\OrderProduct\UI\API\Requests\DeleteOrderProductRequest;
use App\Containers\OrderProduct\UI\API\Requests\GetAllOrderProductsRequest;
use App\Containers\OrderProduct\UI\API\Requests\FindOrderProductByIdRequest;
use App\Containers\OrderProduct\UI\API\Requests\UpdateOrderProductRequest;
use App\Containers\OrderProduct\UI\API\Transformers\OrderProductTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\OrderProduct\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateOrderProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrderProduct(CreateOrderProductRequest $request)
    {
        $orderproduct = Apiato::call('OrderProduct@CreateOrderProductAction', [$request]);

        $this->uploadMedia( $orderproduct, "image", true );
        $this->uploadMedia( $orderproduct, "gallery" );
        $this->uploadMedia( $orderproduct, "file" );

        return $this->created($this->transform($orderproduct, OrderProductTransformer::class));
    }

    /**
     * @param FindOrderProductByIdRequest $request
     * @return array
     */
    public function findOrderProductById(FindOrderProductByIdRequest $request)
    {
        $orderproduct = Apiato::call('OrderProduct@FindOrderProductByIdAction', [$request]);

        return $this->transform($orderproduct, OrderProductTransformer::class);
    }

    /**
     * @param GetAllOrderProductsRequest $request
     * @return array
     */
    public function getAllOrderProducts(GetAllOrderProductsRequest $request)
    {
        $orderproducts = Apiato::call('OrderProduct@GetAllOrderProductsAction', [$request]);

        return $this->transform($orderproducts, OrderProductTransformer::class);
    }

    /**
     * @param UpdateOrderProductRequest $request
     * @return array
     */
    public function updateOrderProduct(UpdateOrderProductRequest $request)
    {
        $orderproduct = Apiato::call('OrderProduct@UpdateOrderProductAction', [$request]);

        $this->uploadMedia( $orderproduct, "image", true );
        $this->uploadMedia( $orderproduct, "gallery" );
        $this->uploadMedia( $orderproduct, "file" );

        return $this->transform($orderproduct, OrderProductTransformer::class);
    }

    /**
     * @param DeleteOrderProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteOrderProduct(DeleteOrderProductRequest $request)
    {
        Apiato::call('OrderProduct@DeleteOrderProductAction', [$request]);

        return $this->noContent();
    }
}
